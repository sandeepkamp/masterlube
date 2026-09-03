<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\CarClubEvent;
use App\Models\CarClubEventPhoto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarClubEventController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $events = CarClubEvent::withCount('photos')->orderBy('order')->get();

        return view('admin.car-club-events.index', compact('events'));
    }

    public function create(): View
    {
        return view('admin.car-club-events.form', ['event' => new CarClubEvent]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->storeImage($request->file('cover_image'), 'car-clubs');
        }

        $event = CarClubEvent::create($data);
        $this->syncPhotos($request, $event);

        return redirect()->route('admin.car-club-events.index')->with('success', 'Event created.');
    }

    public function edit(CarClubEvent $carClubEvent): View
    {
        $carClubEvent->load('photos');

        return view('admin.car-club-events.form', ['event' => $carClubEvent]);
    }

    public function update(Request $request, CarClubEvent $carClubEvent): RedirectResponse
    {
        $data = $this->validated($request);
        $data['cover_image'] = $this->replaceImage($request->file('cover_image'), 'car-clubs', $carClubEvent->cover_image);

        $carClubEvent->update($data);
        $this->syncPhotos($request, $carClubEvent);

        return redirect()->route('admin.car-club-events.index')->with('success', 'Event updated.');
    }

    public function destroy(CarClubEvent $carClubEvent): RedirectResponse
    {
        $this->deleteImage($carClubEvent->cover_image);
        foreach ($carClubEvent->photos as $photo) {
            $this->deleteImage($photo->image);
        }
        $carClubEvent->delete();

        return redirect()->route('admin.car-club-events.index')->with('success', 'Event deleted.');
    }

    public function destroyPhoto(CarClubEventPhoto $photo): RedirectResponse
    {
        $eventId = $photo->car_club_event_id;
        $this->deleteImage($photo->image);
        $photo->delete();

        return redirect()->route('admin.car-club-events.edit', $eventId)->with('success', 'Photo removed.');
    }

    private function syncPhotos(Request $request, CarClubEvent $event): void
    {
        foreach ($request->file('new_photos', []) as $i => $file) {
            $event->photos()->create([
                'image' => $this->storeImage($file, 'car-clubs'),
                'order' => $event->photos()->max('order') + $i + 1,
            ]);
        }
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'cover_image' => ['nullable', 'image', 'max:4096'],
            'description' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);
    }
}

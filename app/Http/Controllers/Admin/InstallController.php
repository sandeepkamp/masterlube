<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Install;
use App\Models\InstallPhoto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InstallController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $installs = Install::withCount('photos')->orderBy('order')->get();

        return view('admin.installs.index', compact('installs'));
    }

    public function create(): View
    {
        return view('admin.installs.form', ['install' => new Install]);
    }

    public function store(Request $request): RedirectResponse
    {
        $install = Install::create($this->validated($request));
        $this->syncPhotos($request, $install);

        return redirect()->route('admin.installs.index')->with('success', 'Install created.');
    }

    public function edit(Install $install): View
    {
        $install->load('photos');

        return view('admin.installs.form', compact('install'));
    }

    public function update(Request $request, Install $install): RedirectResponse
    {
        $install->update($this->validated($request));
        $this->syncPhotos($request, $install);

        return redirect()->route('admin.installs.index')->with('success', 'Install updated.');
    }

    public function destroy(Install $install): RedirectResponse
    {
        foreach ($install->photos as $photo) {
            $this->deleteImage($photo->image);
        }
        $install->delete();

        return redirect()->route('admin.installs.index')->with('success', 'Install deleted.');
    }

    public function destroyPhoto(InstallPhoto $photo): RedirectResponse
    {
        $installId = $photo->install_id;
        $this->deleteImage($photo->image);
        $photo->delete();

        return redirect()->route('admin.installs.edit', $installId)->with('success', 'Photo removed.');
    }

    private function syncPhotos(Request $request, Install $install): void
    {
        foreach ($request->file('new_photos', []) as $i => $file) {
            $install->photos()->create([
                'image' => $this->storeImage($file, 'installs'),
                'order' => $install->photos()->max('order') + $i + 1,
            ]);
        }
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'caption' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\PartnerLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartnerLinkController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $links = PartnerLink::orderBy('order')->get();

        return view('admin.partner-links.index', compact('links'));
    }

    public function create(): View
    {
        return view('admin.partner-links.form', ['link' => new PartnerLink]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request->file('image'), 'partner-links');
        }

        PartnerLink::create($data);

        return redirect()->route('admin.partner-links.index')->with('success', 'Partner link created.');
    }

    public function edit(PartnerLink $partnerLink): View
    {
        return view('admin.partner-links.form', ['link' => $partnerLink]);
    }

    public function update(Request $request, PartnerLink $partnerLink): RedirectResponse
    {
        $data = $this->validated($request);
        $data['image'] = $this->replaceImage($request->file('image'), 'partner-links', $partnerLink->image);

        $partnerLink->update($data);

        return redirect()->route('admin.partner-links.index')->with('success', 'Partner link updated.');
    }

    public function destroy(PartnerLink $partnerLink): RedirectResponse
    {
        $this->deleteImage($partnerLink->image);
        $partnerLink->delete();

        return redirect()->route('admin.partner-links.index')->with('success', 'Partner link deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096'],
            'url' => ['nullable', 'url', 'max:255'],
            'order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);
    }
}

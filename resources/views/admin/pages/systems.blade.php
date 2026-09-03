@extends('admin.layouts.admin')

@section('title', 'Systems Page')

@section('content')
    <h1 class="h4 mb-4">Systems Page</h1>

    <form method="POST" action="{{ route('admin.pages.systems.update') }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="card mb-4">
            <div class="card-body row g-3">
                <div class="col-md-8">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if ($page->image)
                        <img src="{{ media_url($page->image) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
                <div class="col-12">
                    <label class="form-label">Description (blank line between paragraphs)</label>
                    <textarea name="description" class="form-control" rows="8">{{ old('description', $page->description) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Includes List (one per line)</label>
                    <textarea name="includes_list" class="form-control" rows="8">{{ old('includes_list', implode("\n", $page->includes_list ?? [])) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Options / Upgrades List (one per line)</label>
                    <textarea name="options_list" class="form-control" rows="8">{{ old('options_list', implode("\n", $page->options_list ?? [])) }}</textarea>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Kit Tabs</div>
            <div class="card-body">
                <p class="text-muted small">These 5 tabs are fixed slots (the tab bar itself isn't reorderable/addable here) — edit each tab's label, heading, text, and image.</p>
                @php $kits = old('kits', $page->kits ?? []); @endphp
                @for ($i = 0; $i < 5; $i++)
                    @php $kit = $kits[$i] ?? []; @endphp
                    <div class="border rounded p-3 mb-3">
                        <h6 class="mb-3">Tab {{ $i + 1 }}</h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Tab Label</label>
                                <input type="text" name="kits[{{ $i }}][label]" class="form-control" value="{{ $kit['label'] ?? '' }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Heading</label>
                                <input type="text" name="kits[{{ $i }}][title]" class="form-control" value="{{ $kit['title'] ?? '' }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Image</label>
                                <input type="file" name="kits[{{ $i }}][image]" class="form-control" accept="image/*">
                                @if (!empty($kit['image']))
                                    <img src="{{ media_url($kit['image']) }}" class="img-thumbnail mt-2" style="max-height:80px">
                                @endif
                            </div>
                            <div class="col-12">
                                <label class="form-label">Text</label>
                                <textarea name="kits[{{ $i }}][text]" class="form-control" rows="3">{{ $kit['text'] ?? '' }}</textarea>
                            </div>
                            @if ($i === 4)
                                <div class="col-md-6">
                                    <label class="form-label">Contact Email</label>
                                    <input type="text" name="kits[{{ $i }}][contact_email]" class="form-control" value="{{ $kit['contact_email'] ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Contact Phone</label>
                                    <input type="text" name="kits[{{ $i }}][contact_phone]" class="form-control" value="{{ $kit['contact_phone'] ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Extra Image 1</label>
                                    <input type="file" name="kits[{{ $i }}][extra_image_1]" class="form-control" accept="image/*">
                                    @if (!empty($kit['extra_images'][0]))
                                        <img src="{{ media_url($kit['extra_images'][0]) }}" class="img-thumbnail mt-2" style="max-height:80px">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Extra Image 2</label>
                                    <input type="file" name="kits[{{ $i }}][extra_image_2]" class="form-control" accept="image/*">
                                    @if (!empty($kit['extra_images'][1]))
                                        <img src="{{ media_url($kit['extra_images'][1]) }}" class="img-thumbnail mt-2" style="max-height:80px">
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">SEO</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $page->meta_title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control" value="{{ old('meta_description', $page->meta_description) }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

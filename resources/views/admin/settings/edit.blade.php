@extends('admin.layouts.admin')

@section('title', 'Settings')

@section('content')
    <h1 class="h4 mb-4">Site Settings</h1>

    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card mb-4">
            <div class="card-header">General</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $settings['company_name'] ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Company Phone</label>
                    <input type="text" name="company_phone" class="form-control" value="{{ old('company_phone', $settings['company_phone'] ?? '') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Orders Email</label>
                    <input type="text" name="company_email_orders" class="form-control" value="{{ old('company_email_orders', $settings['company_email_orders'] ?? '') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tech Support Email</label>
                    <input type="text" name="company_email_tech" class="form-control" value="{{ old('company_email_tech', $settings['company_email_tech'] ?? '') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Dealer Email</label>
                    <input type="text" name="company_email_dealer" class="form-control" value="{{ old('company_email_dealer', $settings['company_email_dealer'] ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Logo</label>
                    <input type="file" name="logo" class="form-control" accept="image/*">
                    @if (!empty($settings['logo_path']))
                        <div class="form-text">Current: {{ $settings['logo_path'] }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Social Links</div>
            <div class="card-body row g-3">
                @foreach (['facebook_url' => 'Facebook', 'instagram_url' => 'Instagram', 'twitter_url' => 'X / Twitter', 'youtube_url' => 'YouTube'] as $key => $label)
                    <div class="col-md-3">
                        <label class="form-label">{{ $label }}</label>
                        <input type="text" name="{{ $key }}" class="form-control" value="{{ old($key, $settings[$key] ?? '') }}">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Footer</div>
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">Footer Text</label>
                    <textarea name="footer_text" class="form-control" rows="2">{{ old('footer_text', $settings['footer_text'] ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Copyright Text</label>
                    <input type="text" name="copyright_text" class="form-control" value="{{ old('copyright_text', $settings['copyright_text'] ?? '') }}">
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Default SEO</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Default Meta Title</label>
                    <input type="text" name="default_meta_title" class="form-control" value="{{ old('default_meta_title', $settings['default_meta_title'] ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Default Meta Description</label>
                    <input type="text" name="default_meta_description" class="form-control" value="{{ old('default_meta_description', $settings['default_meta_description'] ?? '') }}">
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Industry Page Benefit Copy</div>
            <div class="card-body row g-3">
                <div class="col-md-3">
                    <label class="form-label">Benefit 1 Title</label>
                    <input type="text" name="industry_benefit_1_title" class="form-control" value="{{ old('industry_benefit_1_title', $settings['industry_benefit_1_title'] ?? '') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Benefit 1 Text</label>
                    <input type="text" name="industry_benefit_1_text" class="form-control" value="{{ old('industry_benefit_1_text', $settings['industry_benefit_1_text'] ?? '') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Benefit 2 Title</label>
                    <input type="text" name="industry_benefit_2_title" class="form-control" value="{{ old('industry_benefit_2_title', $settings['industry_benefit_2_title'] ?? '') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Benefit 2 Text</label>
                    <input type="text" name="industry_benefit_2_text" class="form-control" value="{{ old('industry_benefit_2_text', $settings['industry_benefit_2_text'] ?? '') }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
@endsection

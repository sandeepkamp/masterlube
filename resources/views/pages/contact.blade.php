@extends('layouts.app')

@section('meta_title', $page->meta_title ?? 'Contact Us - MasterLube')
@section('meta_description', $page->meta_description ?? \App\Models\Setting::get('default_meta_description'))

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
            <p class="page-banner-eyebrow">Get In Touch</p>
            <h1 class="page-banner-title">Let's Find the Right Lubrication Solution</h1>
            <p class="page-banner-text">Have a question about a MasterLube system or need help selecting the right solution? Get in touch with our team.</p>
        </div>
    </section>

    <section class="contact py-5">
        <div class="container">
            <div class="row gy-5 align-items-start">
                <div class="col-lg-5">
                    <p>{!! $page->intro_text !!}</p>

                    <p>Shipping and Mailing Address:<br>{!! $page->shipping_address !!}</p>

                    <p>For all MasterLube products- Ordering- Factory Direct:<br>
                        {{ $page->ordering_phone }}<br>
                        Ordering Inquiries--- {{ $page->ordering_email }}</p>

                    <p>Technical Assistance &#151; Installation Help:<br>
                        {{ $page->tech_phone }}<br>
                        Call or email for Technical Questions-- {{ $page->tech_email }}</p>

                    <p>For Dealer Inquiries its best to call:<br>
                        {{ $page->dealer_phone }}<br>
                        <a href="mailto:{{ $page->dealer_email }}">{{ $page->dealer_email }}</a></p>

                    <p>General Email:<br>
                        <a href="mailto:{{ \App\Models\Setting::get('company_email_orders') }}">{{ \App\Models\Setting::get('company_email_orders') }}</a></p>

                    <div class="contact-info d-flex align-items-center">
                        <i class="bi bi-telephone"></i>
                        <span>{{ \App\Models\Setting::get('company_phone') }}</span>
                    </div>
                    <div class="contact-info d-flex align-items-center">
                        <i class="bi bi-envelope"></i>
                        <span>{{ \App\Models\Setting::get('company_email_orders') }}</span>
                    </div>
                    <div class="contact-info d-flex align-items-center">
                        <i class="bi bi-geo-alt"></i>
                        <span><a href="{{ route('dealers.index') }}" class="text-decoration-none">Find a dealer near you</a></span>
                    </div>
                </div>

                <div class="col-lg-7">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="first_name" class="form-control contact-input" placeholder="First Name" value="{{ old('first_name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="last_name" class="form-control contact-input" placeholder="Last Name" value="{{ old('last_name') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="company" class="form-control contact-input" placeholder="Company Name" value="{{ old('company') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control contact-input" placeholder="Email" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="address" class="form-control contact-input" placeholder="Address" value="{{ old('address') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="city" class="form-control contact-input" placeholder="City" value="{{ old('city') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="state" class="form-control contact-input" placeholder="State" value="{{ old('state') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="zip" class="form-control contact-input" placeholder="Zip" value="{{ old('zip') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="country" class="form-control contact-input" placeholder="Country" value="{{ old('country') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" name="phone" class="form-control contact-input" placeholder="Contact Phone" value="{{ old('phone') }}">
                            </div>

                            <p class="text-white mb-1">Type of application you would use our system on:<br>Check all that apply</p>

                            <div class="row">
                                @foreach ($applicationTypeOptions->chunk(ceil(count($applicationTypeOptions) / 2)) as $columnIndex => $column)
                                    <div class="col-md-6">
                                        @foreach ($column as $option)
                                            @php $checkId = 'app_type_'.\Illuminate\Support\Str::slug($option); @endphp
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="application_types[]" id="{{ $checkId }}" value="{{ $option }}" @checked(in_array($option, old('application_types', [])))>
                                                <label class="form-check-label text-white" for="{{ $checkId }}">{{ $option }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>

                            <p class="text-white mb-1">How did you hear about us?<br>Check all that apply</p>

                            <div class="row">
                                @foreach ($hearAboutUsOptions->chunk(ceil(count($hearAboutUsOptions) / 2)) as $columnIndex => $column)
                                    <div class="col-md-6">
                                        @foreach ($column as $option)
                                            @php $checkId = 'hear_about_'.\Illuminate\Support\Str::slug($option); @endphp
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="hear_about_us[]" id="{{ $checkId }}" value="{{ $option }}" @checked(in_array($option, old('hear_about_us', [])))>
                                                <label class="form-check-label text-white" for="{{ $checkId }}">{{ $option }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-md-12">
                                <p class="text-white mb-1">* If "Other", please note:</p>
                                <input type="text" name="hear_about_other" class="form-control contact-input" value="{{ old('hear_about_other') }}">
                            </div>

                            <p class="text-white mb-1">Additional Comments or Questions:</p>
                            <div class="col-12">
                                <textarea name="message" class="form-control contact-input contact-textarea" placeholder="Message" rows="5">{{ old('message') }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-light contact-submit">Submit Request</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection

@extends('admin.layouts.admin')

@section('title', 'Enquiry Detail')

@section('content')
    <h1 class="h4 mb-4">Enquiry from {{ trim($enquiry->first_name.' '.$enquiry->last_name) }}</h1>

    <div class="row g-4">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Details</div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Source</dt>
                        <dd class="col-sm-8">{{ $enquiry->source === 'home_quick' ? 'Homepage quick form' : 'Contact page form' }}</dd>

                        <dt class="col-sm-4">Name</dt>
                        <dd class="col-sm-8">{{ trim($enquiry->first_name.' '.$enquiry->last_name) }}</dd>

                        @if ($enquiry->company)
                            <dt class="col-sm-4">Company</dt>
                            <dd class="col-sm-8">{{ $enquiry->company }}</dd>
                        @endif

                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8"><a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a></dd>

                        @if ($enquiry->phone)
                            <dt class="col-sm-4">Phone</dt>
                            <dd class="col-sm-8">{{ $enquiry->phone }}</dd>
                        @endif

                        @if ($enquiry->address || $enquiry->city || $enquiry->state)
                            <dt class="col-sm-4">Address</dt>
                            <dd class="col-sm-8">{{ collect([$enquiry->address, $enquiry->city, $enquiry->state, $enquiry->zip, $enquiry->country])->filter()->implode(', ') }}</dd>
                        @endif

                        @if ($enquiry->equipment_type)
                            <dt class="col-sm-4">Equipment Type</dt>
                            <dd class="col-sm-8">{{ $enquiry->equipment_type }}</dd>
                        @endif

                        @if ($enquiry->application_types)
                            <dt class="col-sm-4">Type of Application</dt>
                            <dd class="col-sm-8">{{ implode(', ', $enquiry->application_types) }}</dd>
                        @endif

                        @if ($enquiry->hear_about_us)
                            <dt class="col-sm-4">How They Heard About Us</dt>
                            <dd class="col-sm-8">{{ implode(', ', $enquiry->hear_about_us) }}</dd>
                        @endif

                        @if ($enquiry->hear_about_other)
                            <dt class="col-sm-4">Other</dt>
                            <dd class="col-sm-8">{{ $enquiry->hear_about_other }}</dd>
                        @endif

                        @if ($enquiry->message)
                            <dt class="col-sm-4">Message</dt>
                            <dd class="col-sm-8">{{ $enquiry->message }}</dd>
                        @endif

                        <dt class="col-sm-4">Received</dt>
                        <dd class="col-sm-8">{{ $enquiry->created_at->format('M j, Y g:ia') }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Status &amp; Notes</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.enquiries.update', $enquiry) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                @foreach (['new' => 'New', 'contacted' => 'Contacted', 'closed' => 'Closed'] as $value => $label)
                                    <option value="{{ $value }}" @selected($enquiry->status === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Internal Notes</label>
                            <textarea name="admin_notes" class="form-control" rows="5">{{ old('admin_notes', $enquiry->admin_notes) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                    <form method="POST" action="{{ route('admin.enquiries.destroy', $enquiry) }}" class="mt-3" onsubmit="return confirm('Delete this enquiry?');">
                        @csrf @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm">Delete Enquiry</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.enquiries.index') }}" class="btn btn-link mt-3">Back to Enquiries</a>
@endsection

@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="h4 mb-4">Dashboard</h1>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <div class="display-6">{{ $enquiryCounts['new'] }}</div>
                    <div class="text-muted">New Enquiries</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <div class="display-6">{{ $enquiryCounts['contacted'] }}</div>
                    <div class="text-muted">Contacted</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <div class="display-6">{{ $enquiryCounts['closed'] }}</div>
                    <div class="text-muted">Closed</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Recent Enquiries
                    <a href="{{ route('admin.enquiries.index') }}" class="small">View all</a>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($recentEnquiries as $enquiry)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.enquiries.show', $enquiry) }}">{{ trim($enquiry->first_name.' '.$enquiry->last_name) }}</a>
                            <span class="badge bg-light text-dark">{{ $enquiry->created_at->diffForHumans() }}</span>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">No enquiries yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Industries Still in Draft
                    <a href="{{ route('admin.industries.index') }}" class="small">Manage</a>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($draftIndustries as $industry)
                        <li class="list-group-item">
                            <a href="{{ route('admin.industries.edit', $industry) }}">{{ $industry->name }}</a>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">None — every industry page is published.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-1">
        @foreach ($moduleCounts as $label => $count)
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body py-3">
                        <div class="h4 mb-0">{{ $count }}</div>
                        <div class="text-muted small">{{ $label }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

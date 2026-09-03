@extends('admin.layouts.admin')

@section('title', 'Enquiries')

@section('content')
    <h1 class="h4 mb-4">Enquiries</h1>

    <form class="mb-3" method="GET">
        <select name="status" class="form-select w-auto d-inline-block" onchange="this.form.submit()">
            <option value="">All statuses</option>
            @foreach (['new' => 'New', 'contacted' => 'Contacted', 'closed' => 'Closed'] as $value => $label)
                <option value="{{ $value }}" @selected($status === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </form>

    <div class="card">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Source</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enquiries as $enquiry)
                    <tr>
                        <td>{{ $enquiry->created_at->format('M j, Y g:ia') }}</td>
                        <td>{{ trim($enquiry->first_name.' '.$enquiry->last_name) }}</td>
                        <td>{{ $enquiry->email }}</td>
                        <td>{{ $enquiry->source === 'home_quick' ? 'Homepage' : 'Contact page' }}</td>
                        <td>
                            <span class="badge {{ match($enquiry->status) { 'new' => 'bg-primary', 'contacted' => 'bg-warning text-dark', 'closed' => 'bg-secondary' } }}">{{ ucfirst($enquiry->status) }}</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="btn btn-sm btn-outline-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $enquiries->links() }}</div>
@endsection

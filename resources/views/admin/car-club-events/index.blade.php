@extends('admin.layouts.admin')

@section('title', 'Car Clubs')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Car Clubs / Events</h1>
        <a href="{{ route('admin.car-club-events.create') }}" class="btn btn-primary btn-sm">Add Event</a>
    </div>

    <div class="card">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Photos</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->order }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->photos_count }}</td>
                        <td><span class="badge {{ $event->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($event->status) }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.car-club-events.edit', $event) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.car-club-events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this event and all its photos?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('app', [
'title' => 'Event Registration',
])

@section('content')
@include('sweetalert::alert')

<div class="container mt-4">
    <h1 class="mb-4">Event Registration</h1>

    <form action="{{ route('user.events.register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="event_id" class="form-label">Select Event</label>
            <select id="event_id" name="event_id" class="form-select" required>
                <option value="" disabled>Select an event</option>
                @foreach($events as $eventOption)
                <option value="{{ $eventOption->event_id }}"
                    {{ $eventOption->event_id == $event->event_id ? 'selected' : '' }}>
                    {{ $eventOption->title }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection
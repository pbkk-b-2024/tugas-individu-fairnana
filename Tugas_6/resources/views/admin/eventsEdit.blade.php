@extends('app', [
'title' => 'Edit Event - ' . $event->title, // Menggunakan $event->title
])

@section('content')

<div class="container">
    <h1 class="my-4">Edit Event</h1>

    <form action="{{ route('admin.events.update', ['event_id' => $event->event_id]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menggunakan metode PUT untuk update -->

        <div class="mb-3">
            <label for="title" class="form-label">Event Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $event->title }}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" class="form-select" id="category" required>
                <option value="">Select Category</option>
                @foreach($eventCategories as $category)
                <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="4" required>{{ $event->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="registration_date" class="form-label">Registration Date</label>
            <input type="date" name="registration_date" class="form-control" id="registration_date" value="{{ $event->registration_date }}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Event Date</label>
            <input type="date" name="date" class="form-control" id="date" value="{{ $event->date }}" required>
        </div>

        <div class="mb-3">
            <label for="venue" class="form-label">Venue</label>
            <select name="venue_id" class="form-select" id="venue" required>
                <option value="">Select Venue</option>
                @foreach($venues as $venue)
                <option value="{{ $venue->id }}" {{ $event->venue_id == $venue->id ? 'selected' : '' }}>
                    {{ $venue->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ $event->price }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>


</div>

@endsection
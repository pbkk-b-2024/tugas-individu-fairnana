@extends('app', [
'title' => 'Dashboard - Events',
])

@section('content')
@include('sweetalert::alert')

<div class="container mt-4">
    <h1 class="mb-4">Event List</h1>

    <!-- Tombol untuk menambah event baru -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button
            onclick="window.location.href='{{ route('admin.events.create') }}'"
            class="btn btn-primary d-flex align-items-center">
            <i class="fa-solid fa-plus me-2"></i> Add New Event
        </button>

        <!-- Input untuk mencari acara -->
        <div class="input-group" style="width: 300px;">
            <input type="text" id="search" class="form-control" placeholder="Search events..." aria-label="Search events" aria-describedby="button-search">
            <button class="btn btn-primary" type="button" id="button-search">Search</button>
        </div>
    </div>

    <!-- Tabel untuk menampilkan daftar acara -->
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm">
        <thead class="table-dark align-middle text-center">
            <tr>
                <th>Event ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Registration Date</th>
                <th>Event Date</th>
                <th>Venue</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="event-table-body">
            @foreach($events as $event)
            <tr>
                <td>{{ $event->event_id }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->eventCategory->name ?? 'N/A' }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ \Carbon\Carbon::parse($event->registration_date)->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</td>
                <td>{{ $event->venue->name ?? 'N/A' }}</td>
                <td>{{ $event->price }}</td>
                <td>
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('admin.events.edit', $event->event_id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <i class="fa-solid fa-pencil fa-fw" style="color: black;"></i>
                        </a>
                        <form action="{{ route('admin.events.destroy', $event->event_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" onclick="return confirm('Are you sure you want to delete this event?');">
                                <i class="fa-solid fa-trash fa-fw" style="color: black;"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // Fungsi untuk pencarian acara
    document.getElementById('button-search').addEventListener('click', function() {
        let searchTerm = document.getElementById('search').value.toLowerCase();
        let eventRows = document.querySelectorAll('#event-table-body tr');
        eventRows.forEach(row => {
            let title = row.cells[1].innerText.toLowerCase();
            if (title.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

@endsection
@extends('app', [
'title' => 'Dashboard - Events',
])

@section('content')
@include('sweetalert::alert')

<div class="container mt-4">
    <h1 class="mb-4">Event List</h1>

    <!-- Input untuk mencari acara -->
    <div class="input-group mb-3">
        <input type="text" id="search" class="form-control" placeholder="Search events..." aria-label="Search events" aria-describedby="button-search">
        <button class="btn btn-primary" type="button" id="button-search">Search</button>
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
                    <div class="d-flex justify-content-start flex-shrink-0">
                        <a href="{{ route('user.events.registration', $event->event_id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 text-primary">
                            Register
                        </a>
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
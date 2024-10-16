@extends('app', [
'title' => 'My Events',
])

@section('content')
@include('sweetalert::alert')

<div class="container mt-4">
    <h1 class="mb-4">Your Registered Events</h1>

    @if($events->isEmpty())
    <p>You have not registered for any events.</p>
    @else
    <table class="table table-bordered table-striped table-hover align-middle  shadow-sm">
        <thead class="table-dark align-middle text-center">
            <tr>
                <th>Event Title</th>
                <th>Date</th>
                <th>Venue</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</td>
                <td>{{ $event->venue->name }}</td>
                <td class="text-center align-middle">
                    <a href="#" class="btn btn-danger">Cancel Registration</a> <!-- Tambahkan logika untuk membatalkan pendaftaran jika perlu -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
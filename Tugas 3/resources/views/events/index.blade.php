@extends('layouts.main')

@section('title', 'Daftar Acara')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Acara</h4>
        </div>
        <div class="card-body">
            <!-- Search Bar -->
            <form action="{{ route('events.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan judul" value="{{ request()->query('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search"></i> Cari
                    </button>
                </div>
            </form>
            <!-- Table -->
            <div class="table-responsive">
                <table class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Judul</th>
                            <!-- <th>Kategori</th> -->
                            <th>Deskripsi</th>
                            <th>Tanggal Acara</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td>{{ $event->event_id }}</td>
                            <td>{{ $event->title }}</td>
                            <!-- <td>{{ $event->kategori ? $event->category->name : '-' }}</td> -->

                            <td>{{ $event->description }}</td>
                            <td>{{ $event->event_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $events->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.main')

@section('title', 'Daftar Users')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">User Data</h4>
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-round ms-auto">
                    <i class="fa fa-plus"></i> Add User
                </a>
            </div>
        </div>
        <div class="card-body">
            <!-- Search Bar -->
            <form action="{{ route('users.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request()->query('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search"></i> Search
                    </button>
                </div>
            </form>
            <!-- Table -->
            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->role ? $user->role->name : '-' }}</td>
                            <td>
                                <div class="form-button-action">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link btn-danger" data-bs-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Anda yakin ingin menghapus user ini?')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
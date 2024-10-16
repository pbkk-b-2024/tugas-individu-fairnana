<?php
@extends('app', [
'title' => 'Edit User - ' . $user->name,
])

@section('content')
<div class="container">
    <h1 class="my-4">Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">

        @method('POST') <!-- Pastikan menggunakan POST untuk mengupdate -->

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection
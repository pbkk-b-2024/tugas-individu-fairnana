@extends('app', [
'title' => 'Edit Profile - ' . $user->name,
])

@section('content')
<div class="container">
    <h1 class="my-4">Edit Profile</h1>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="profile_photo" class="form-label">Foto Profil (Opsional)</label>
            <input type="file" name="profile_photo" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Update Profil</button>
    </form>
    @endsection
@extends('app', [
'title' => 'Dashboard - Users',
])

@section('content')
@include('sweetalert::alert')

<div class="container mt-4">
    <h1 class="mb-4 text-center">Users List</h1>

    <!-- Input untuk mencari pengguna -->
    <div class="input-group mb-3">
        <input type="text" id="search" class="form-control" placeholder="Search users..." aria-label="Search users" aria-describedby="button-search">
        <button class="btn btn-primary" type="button" id="button-search">Search</button>
    </div>

    <!-- Tabel untuk menampilkan daftar pengguna -->
    <table class="table table-bordered table-striped table-hover align-middle  shadow-sm">
        <thead class="table-dark align-middle text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="user-table-body">
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-center align-middle">
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" onclick="return confirm('Are you sure you want to delete this event?');">
                            <i data-fa-symbol="delete" class="fa-solid fa-trash fa-fw" style="color: black;"></i>
                            </i>
                        </button>

                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script>
    // Fungsi untuk pencarian pengguna
    document.getElementById('button-search').addEventListener('click', function() {
        let searchTerm = document.getElementById('search').value.toLowerCase();
        let userRows = document.querySelectorAll('#user-table-body tr');
        userRows.forEach(row => {
            let name = row.cells[1].innerText.toLowerCase();
            if (name.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

@endsection
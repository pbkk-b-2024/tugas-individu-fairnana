<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UserController extends Controller
{
    // Menampilkan daftar user
    public function index(Request $request)
    {
        // Membuat query dasar untuk model User
        $query = User::query();

        // Jika ada pencarian, tambahkan kondisi pencarian ke query
        if ($request->has('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }
        $users = $query->paginate(10); // Menampilkan 10 pengguna per halaman

        // Mengirim data pengguna ke view
        return view('users.index', compact('users'));
    }

    // Menampilkan form untuk membuat user baru
    public function create()
    {
        $roles = Role::all(); // Ambil semua data role untuk dropdown
        return view('users.addnew', compact('roles'));
    }

    // Menyimpan user baru ke dalam database
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:3',
            'role_id' => 'required|exists:roles,id'
        ]);

        // Simpan data ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Menampilkan form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Ambil semua data role untuk dropdown
        return view('users.edit', compact('user', 'roles'));
    }

    // Mengupdate data user yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate.');
    }


    // Menghapus user
    public function destroy($id)
    {
        // Mengambil user berdasarkan ID
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect ke halaman user index dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}

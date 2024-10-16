<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class AdminController extends Controller
{
    // Menampilkan semua user
    public function index(Request $request)
    {
        $users = User::all();
        return view('admin.users', compact('users'));
        // return response()->json($users, 200);
    }

    // Menampilkan form edit untuk user tertentu
    public function edit($id)
    {
        // Temukan user berdasarkan id
        $user = User::findOrFail($id);
        // return response()->json($id, 200);
        // Kirim data user ke view untuk diedit
        return view('admin.userEdit', compact('user'));
    }

    // Membuat user baru
    public function store(Request $request)
    {
        // Validasi input dari request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Enkripsi password
        ]);

        return response()->json([
            'message' => 'User created successfully!',
            'user' => $user
        ], 201); // 201 untuk status created
    }

    // Mengupdate user
    public function update(Request $request, User $user)
    {
        // Validasi input dari request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            //'password' => 'sometimes|nullable|string|min:8', // Password opsional
        ]);

        // Mengupdate user dengan data baru
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            //'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password, // Hanya update password jika ada
        ]);

        return response()->json([
            'message' => 'User updated successfully!',
            'user' => $user
        ], 200); // 200 untuk status OK
    }

    // Menghapus user
    // Menghapus user
    public function destroy($id)
    {
        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Menghapus user
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully!'
        ], 200); // 200 untuk status OK
    }
}

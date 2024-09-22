<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event; // Pastikan model Event sudah dibuat
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // Menampilkan daftar acara
    public function index(Request $request)
    {
        if (Auth::check() && Auth::user()->role_id == 2) {
            // Membuat query dasar untuk model Event
            $query = Event::query();

            // Jika ada pencarian, tambahkan kondisi pencarian ke query
            if ($request->has('search')) {
                $search = $request->query('search');
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            }

            // Mengambil data acara dengan pagination
            $events = $query->paginate(10); // Menampilkan 10 acara per halaman

            // Mengirim data acara ke view
            return view('events.index', compact('events'));
        }

        return redirect('/'); // Redirect jika bukan user
    }

    // Menampilkan detail acara
    // public function show($id)
    // {
    //     if (Auth::check() && Auth::user()->role_id == 2) {
    //         $event = Event::findOrFail($id); // Mengambil acara berdasarkan ID
    //         return view('eventshow', compact('event')); // Pastikan view eventshow.blade.php ada
    //     }

    //     return redirect('/'); // Redirect jika bukan user
    // }

    // Metode untuk mendaftar acara
    // public function register($id)
    // {
    //     if (Auth::check() && Auth::user()->role_id == 2) {
    //         $event = Event::findOrFail($id); // Mengambil acara berdasarkan ID
    //         // Logika untuk mendaftar acara, seperti menyimpan data ke database
    //         // Contoh: User::find(Auth::id())->events()->attach($event);

    //         // Redirect dengan pesan sukses
    //         return redirect()->route('events.index')->with('success', 'Berhasil mendaftar acara.');
    //     }

    //     return redirect('/'); // Redirect jika bukan user
    // }

    // Metode untuk menampilkan daftar acara yang diikuti oleh pengguna
    // public function myEvents()
    // {
    //     if (Auth::check() && Auth::user()->role_id == 2) {
    //         $user = auth()->user(); // Ambil pengguna yang sedang login
    //         $events = $user->events; // Asumsikan ada relasi antara User dan Event

    //         return view('events.my_events', compact('events')); // Pastikan view my_events.blade.php ada
    //     }

    //     return redirect('/'); // Redirect jika bukan user
    // }
}

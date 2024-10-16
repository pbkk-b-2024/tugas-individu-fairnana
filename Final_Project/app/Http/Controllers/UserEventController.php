<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Registration; // Pastikan model ini ada untuk menyimpan pendaftaran


class UserEventController extends Controller
{
    // Menampilkan acara saat ini
    public function currentEvents()
    {
        // Mengambil semua data dari tabel events dengan relasi venue dan kategori
        $events = Event::with(['venue', 'eventCategory'])->get(); // Menyertakan relasi dengan venue dan kategori

        // Mengembalikan tampilan dengan data acara
        return view('users.events', compact('events'));
    }

    // Menampilkan acara mendatang
    public function upcomingEvents()
    {
        $events = Event::with(['venue', 'eventCategory'])
            ->where('date', '>', now()) // Mengambil acara yang akan datang
            ->get();

        return view('users.events', compact('events'));
    }

    // Menampilkan acara yang diikuti oleh pengguna
    public function myEvents()
    {
        $userId = Auth::id();

        // Mengambil acara yang terdaftar oleh pengguna
        $events = Event::whereHas('registrations', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        return view('users.my_events', compact('events')); // Pastikan Anda memiliki view ini
    }


    // Menampilkan form pendaftaran acara
    public function showRegistrationForm($event_id)
    {
        // Mengambil acara berdasarkan ID yang diterima
        $event = Event::findOrFail($event_id);


        $events = Event::all();

        return view('users.registration', compact('event', 'events')); // Mengirim data acara dan daftar acara ke view
    }


    // Menangani pendaftaran acara
    public function register(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'event_id' => 'required|exists:events,event_id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Menyimpan pendaftaran acara
        Registration::create([
            'event_id' => $validated['event_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'user_id' => Auth::id(), // Menyimpan ID pengguna yang terdaftar
            'status' => 'pending', // Atur status sesuai kebutuhan
        ]);

        // Redirect dengan pesan sukses ke halaman my events
        return redirect()->route('users.events.my')->with('success', 'Anda telah berhasil mendaftar untuk acara.');
    }
}

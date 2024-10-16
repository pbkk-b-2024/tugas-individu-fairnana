<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Venue;
use App\Models\EventCategory;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function comingsoon()
    {
        // Mengambil semua data dari tabel events tanpa join
        $events = Event::all(); // Menggunakan Eloquent untuk mengambil data

        // Pastikan data tidak kosong
        if ($events->isEmpty()) {
            return Inertia::render('EventList', [
                'events' => [], // Mengirim array kosong jika tidak ada data
            ]);
        }

        return Inertia::render('EventList', [
            'events' => $events,
        ]);
    }

    public function index()
    {
        // Mengambil semua data dari tabel events dengan relasi venue dan kategori
        $events = Event::with(['venue', 'eventCategory'])->get(); // Menyertakan relasi dengan venue dan kategori

        // Mengembalikan tampilan dengan data acara
        return view('admin.events', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil data venue dan kategori untuk form pembuatan event
        $venues = Venue::all();
        $eventCategories = EventCategory::all();

        // Mengembalikan tampilan form untuk membuat event
        return view('admin.eventsCreate', compact('venues', 'eventCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:event_categories,id',
            'description' => 'required|string',
            'registration_date' => 'required|date',
            'event_date' => 'required|date|after_or_equal:registration_date', // Pastikan ada kolom ini
            'venue_id' => 'required|exists:venues,id',
            'price' => 'required|numeric|min:0',
        ]);

        // Simpan data ke database
        Event::create($validatedData);

        return redirect()->route('admin.events.index')->with('success', 'Event successfully created!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Mengambil acara berdasarkan ID
        $event = Event::with(['venue', 'eventCategory'])->findOrFail($id);

        // Mengambil semua kategori untuk dropdown
        $eventCategories = EventCategory::all(); // Pastikan variabel ini ada

        // Mengambil semua venue untuk dropdown
        $venues = Venue::all();

        // Kirim semua variabel ke view
        return view('admin.eventsEdit', compact('event', 'eventCategories', 'venues'));
    }


    public function update(Request $request, $event_id)
    {
        $event = Event::findOrFail($event_id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:event_categories,id',
            'description' => 'required|string',
            'registration_date' => 'required|date',
            'date' => 'required|date|after_or_equal:registration_date',
            'venue_id' => 'required|exists:venues,id',
            'price' => 'required|numeric|min:0',
        ]);

        $event->update($validatedData);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mencari event dan menghapusnya
        $event = Event::findOrFail($id);
        $event->delete();

        // Redirect ke halaman daftar event dengan pesan sukses
        return redirect()->route('admin.events.index')->with('success', 'Event successfully deleted!');
    }
}

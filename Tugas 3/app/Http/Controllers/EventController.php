<?php

namespace App\Http\Controllers;

use App\Models\Event; // Pastikan model Event sudah dibuat
use Illuminate\Http\Request;
use App\Models\Role;

class EventController extends Controller
{
    public function index(Request $request)
    {
        // Logika untuk menampilkan daftar event
        $events = Event::with('category')->paginate(10);
        return view('events.index', compact('events'));
    }
}

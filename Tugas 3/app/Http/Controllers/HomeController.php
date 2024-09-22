<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class HomeController extends Controller
{
    public function home()
    {
        return view('home'); // Pastikan ini merujuk pada view home Anda
    }
}

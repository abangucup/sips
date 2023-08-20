<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;

class JenisSampahController extends Controller
{
    public function index()
    {
        $jenisSampah = JenisSampah::all();
        return view('dashboard.p3b3k.jenis.index', compact('jenisSampah'));
    }
}

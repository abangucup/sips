<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    public function index()
    {
        $sampahs = Sampah::all();
        return view('dashboard.p3b3k.sampah.index', compact('sampahs'));
    }
}

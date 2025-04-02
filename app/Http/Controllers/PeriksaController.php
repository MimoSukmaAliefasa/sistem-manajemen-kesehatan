<?php

namespace App\Http\Controllers;

use App\Models\Periksas;
use Illuminate\Http\Request;

class PeriksaController extends Controller
{
    public function index()
    {
        return view('pasien/periksa.index');
    }
}


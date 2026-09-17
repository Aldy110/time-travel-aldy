<?php

namespace App\Http\Controllers;

use App\Models\Memory;

class MemoryController extends Controller
{
    public function index()
    {
        $memories = Memory::orderBy('date', 'asc')->get();

        return view('welcome', compact('memories'));
    }
}
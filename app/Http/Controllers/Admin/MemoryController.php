<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Memory;
use Illuminate\Http\Request;

class MemoryController extends Controller
{
    public function index()
    {
        $memories = Memory::orderBy('date', 'desc')->get();

        return view('admin.memories.index', compact('memories'));
    }

    public function create()
    {
        return view('admin.memories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('memories', 'public');
        }

        Memory::create($validated);

        return redirect()
            ->route('admin.memories.index')
            ->with('success', 'Memory berhasil ditambahkan.');
    }

    public function edit(Memory $memory)
    {
        return view('admin.memories.edit', compact('memory'));
    }

    public function update(Request $request, Memory $memory)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('memories', 'public');
        }

        $memory->update($validated);

        return redirect()
            ->route('admin.memories.index')
            ->with('success', 'Memory berhasil diperbarui.');
    }

    public function destroy(Memory $memory)
    {
        $memory->delete();

        return redirect()
            ->route('admin.memories.index')
            ->with('success', 'Memory berhasil dihapus.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $area = Area::all();
        return view('area.index', compact('area'));
    }

    public function create()
    {
        return view('area.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Area::create($request->all());

        return redirect()->route('area.index')
            ->with('success', 'Area created successfully.');
    }

    public function show(Area $area)
    {
        return view('area.show', compact('area'));
    }

    public function edit(Area $area)
    {
        return view('area.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $area->update($request->all());

        return redirect()->route('area.index')
            ->with('success', 'Area updated successfully.');
    }

    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('area.index')
            ->with('success', 'Area deleted successfully.');
    }
}

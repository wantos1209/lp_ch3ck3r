<?php

namespace App\Http\Controllers;

use App\Models\ListBarang;
use Illuminate\Http\Request;

class ListBarangController extends Controller
{
    public function index()
    {
        $listbarang = ListBarang::all();
        return view('listbarang.index', compact('listbarang'));
    }

    public function create()
    {
        return view('listbarang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        ListBarang::create($request->all());

        return redirect()->route('listbarang.index')
            ->with('success', 'ListBarang created successfully.');
    }

    public function show(ListBarang $listbarang)
    {
        return view('listbarang.show', compact('listbarang'));
    }

    public function edit(ListBarang $listbarang)
    {
        return view('listbarang.edit', compact('listbarang'));
    }

    public function update(Request $request, ListBarang $listbarang)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $listbarang->update($request->all());

        return redirect()->route('listbarang.index')
            ->with('success', 'ListBarang updated successfully.');
    }

    public function destroy(ListBarang $listbarang)
    {
        $listbarang->delete();

        return redirect()->route('listbarang.index')
            ->with('success', 'ListBarang deleted successfully.');
    }
}

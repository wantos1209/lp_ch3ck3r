<?php

namespace App\Http\Controllers;

use App\Models\ListBarang;
use Illuminate\Http\Request;

class ListBarangController extends Controller
{
    public function index()
    {
        $area = ListBarang::all();
        return view('listbarang.index', compact('area'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function index()
    {
        return view('scan');
    }

    public function store(Request $request)
    {
        $barcode = $request->input('barcode');
        // Simpan barcode ke database atau lakukan sesuatu dengan barcode

        return redirect('/scan')->with('success', 'Barcode berhasil dipindai dan disimpan.');
    }
}

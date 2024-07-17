<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function index()
    {
        return view('barcode');
    }

    public function scan(Request $request)
    {
        $barcode = $request->input('barcode');

        // Lakukan sesuatu dengan barcode, seperti mencari produk di database
        // Misalnya:
        // $product = Product::where('barcode', $barcode)->first();

        return response()->json([
            'status' => 'success',
            'barcode' => $barcode,
            // 'product' => $product
        ]);
    }
}

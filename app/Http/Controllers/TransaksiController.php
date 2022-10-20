<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return $transaksi;
    }
    public function store(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi->tabungan_id = $request->tabungan_id;
        $transaksi->total = $request->total;
        $transaksi->save();
    }
}

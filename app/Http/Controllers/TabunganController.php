<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TabunganController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('uid')) {
            $tabungan = Tabungan::where('user_id', $request->uid)->get();
            return $tabungan;
        } else {
            $tabungan = Tabungan::all();
            return $tabungan;
        }
    }
    public function store(Request $request)
    {
        $checTab  = Tabungan::where('user_id', auth('sanctum')->user()->id)->first();
        if (count($checTab) > 1) {
            $checTab->user_id = auth('sanctum')->user()->id; //insert via token by sanctum kalo ndak bisa ganti $request->user_id;
            $checTab->tanggal = $request->tanggal;
            $checTab->total = $checTab->total + $request->total;
            $checTab->update();
        } else {

            $tabungan = new Tabungan();
            $tabungan->user_id = auth('sanctum')->user()->id; //insert via token by sanctum kalo ndak bisa ganti $request->user_id;
            $tabungan->tanggal = $request->tanggal;
            $tabungan->total = $request->total;
            $tabungan->save();
        }
    }
}

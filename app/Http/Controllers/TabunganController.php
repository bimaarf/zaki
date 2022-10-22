<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TabunganController extends Controller
{
    public function index()
    {
        $tabungan = Tabungan::all();
        return $tabungan;
    }
    public function store()
    {
        $tabungan = new Tabungan();
        $tabungan->user_id = auth('sanctum')->user()->id; //insert via token by sanctum kalo ndak bisa ganti $request->user_id;
        $tabungan->save();
    }
}

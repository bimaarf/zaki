<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';
    protected $with = ['tabungan'];
    public function tabungan()
    {
        return $this->belongsTo(Tabungan::class);
    }
    public function getTabunganAttribute()
    {
        return $this->belongsTo(Tabungan::class);
    }
}

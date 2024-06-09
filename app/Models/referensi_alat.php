<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alat extends Model
{
    use HasFactory;
    protected $table = "referensi_alat";
    protected $primaryKey = "id_alat";
    public $timestamps = false;

    public function udara()
    {
        return $this->hasMany(Histori_kualitas::class);
    }

    public function kawasan()
    {
        return $this->belongsTo(kawasan::class,'id_kawasan');
    }
}

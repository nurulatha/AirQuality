<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kawasan extends Model
{
    use HasFactory;
    protected $table = "kawasan";
    protected $primaryKey = "id_kawasan";
    public $timestamps = false;


    public function alat_kawasan()
    {
        return $this->hasMany(referensi_alat::class,'id_kawasan');
    }
}

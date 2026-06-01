<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = [
        'nama_dokter',
        'spesialis',
        'alamat',
        'no_hp',
    ];
    public function rekamMedis()
{
    return $this->hasMany(RekamMedis::class);
}
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'no_rm',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'no_hp',
    ];
    public function rekamMedis()
{
    return $this->hasMany(RekamMedis::class);
}
}
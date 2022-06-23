<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $table = 'klasifikasi';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType = 'string';
    // protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'kode_klasifikasi',
        'judul_klasifikasi',
        'keterangan',
        'instansi_id',
    ];

    public function instansi()
    {
        return $this->belongsTo(\App\Models\Instansi::class, 'instansi_id');
    }
}

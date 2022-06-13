<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = 'instansi';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType = 'string';
    // protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'nama_instansi',
        'nama_lembaga',
        'alamat_instansi',
        'status_instansi',
        'nama_kepala_instansi',
        'nip_instansi',
        'npwp_instansi',
        'email_instansi',
        'telp_instansi',
    ];
}

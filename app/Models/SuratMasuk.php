<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'nomor_surat_masuk',
        'nomor_agenda_surat_masuk',
        'asal_surat',
        'isi_ringkasan',
        'keterangan',
        'klasifikasi_id',
        'tanggal_surat',
        'tanggal_terima',
        'file',
    ];
}

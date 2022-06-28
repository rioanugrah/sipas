<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'surat_masuk';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'user_pengirim_id',
        'unit_kerja_id',
        'nomor_surat_masuk',
        'nomor_agenda_surat_masuk',
        'asal_surat',
        'isi_ringkasan',
        'keterangan',
        'klasifikasi_id',
        'instansi_id',
        'tanggal_surat',
        'tanggal_terima',
        'status',
        'status_surat',
        'file',
    ];

    public function instansi()
    {
        return $this->belongsTo(\App\Models\Instansi::class, 'instansi_id');
    }
    public function unit_kerja()
    {
        return $this->belongsTo(\App\Models\UnitKerja::class, 'unit_kerja_id');
    }
}

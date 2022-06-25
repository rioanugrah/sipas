<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat_keluar';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'user_pengirim_id',
        'nomor_surat_keluar',
        'nomor_agenda_surat_keluar',
        'tujuan_surat',
        'isi_ringkasan',
        'keterangan',
        'klasifikasi_id',
        'tanggal_surat',
        'tanggal_terima',
        'status',
        'status_surat',
        'file',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = 'disposisi';
    protected $primaryKey = 'id';
    public $incrementing = false;
    // protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'surat_masuk_id',
        'dari',
        'keterangan',
        'diterima',
    ];
}

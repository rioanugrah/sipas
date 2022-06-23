<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    protected $table = 'unit_kerja';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType = 'string';
    // protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'unit_kerja',
        'instansi_id',
    ];
    public function instansi()
    {
        return $this->belongsTo(\App\Models\Instansi::class, 'instansi_id');
    }
}

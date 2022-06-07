<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisposisiList extends Model
{
    protected $table = 'disposisi_list';
    protected $primaryKey = 'id';
    public $incrementing = false;
    // protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'nama_disposisi',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $incrementing = false;
    // protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'nama_role',
    ];
}

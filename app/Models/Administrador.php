<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Authenticatable
{
    public $timestamps = false;
    protected $table = 'tb_administrador';
    protected $primaryKey = 'id_administrador';
    
    protected $fillable = [
        'nm_email_admin', 'password'
    ];
    
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TbUser extends Authenticatable
{
    use HasFactory;

    protected $table = 'tb_user';
    protected $primaryKey = 'nip';
    protected $fillable = ['nip', 'username', 'password', 'email', 'jabatan_user'];
    public $timestamps = false;
}

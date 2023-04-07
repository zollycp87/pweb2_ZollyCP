<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbPegawai extends Model
{
    use HasFactory;

    protected $table = 'tb_pegawai';
    protected $primaryKey = 'nip';
    protected $fillable = ['nip', 'nama_pegawai', 'divisi'];
    public $timestamps = false;
}

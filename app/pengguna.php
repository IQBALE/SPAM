<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    //
    protected $table = 'penggunas';

    protected $fillable = ['id_pengguna', 'nama_pengguna','username', 'password'];
}

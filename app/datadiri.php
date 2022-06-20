<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datadiri extends Model
{
    //
    protected $table = 'datadiris';

    protected $fillable = ['id_pengguna', 'nama_lengkap','tempat', 'tanggal_lahir', 'jeniskelamin','no_hp', 'email', 'alamat'];
}

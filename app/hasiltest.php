<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hasiltest extends Model
{
    //
    protected $table = 'hasiltests';

    protected $fillable = ['id_hasil', 'id_pengguna', 'id_pendaftaran','nama_file'];
}

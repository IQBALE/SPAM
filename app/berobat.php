<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berobat extends Model
{
    //
    protected $table = 'berobats';

    protected $fillable = ['id_pendaftaran', 'id_poli', 'tanggal','kode_pendaftaran'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class swab extends Model
{
    //
    protected $table = 'swabs';

    protected $fillable = ['id_pendaftaran', 'tanggal_swab','kode_pendaftaran'];
}

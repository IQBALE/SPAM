<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poli extends Model
{
    //
    protected $table = 'polis';

    protected $fillable = ['id_poli', 'nama_poli','jadwal_poli'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kritiksaran extends Model
{
    protected $table = 'kritiksarans';

    protected $fillable = ['id_kritik', 'id_pengguna','kritik','saran'];
}

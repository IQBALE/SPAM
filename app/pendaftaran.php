<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    protected $table = 'pendaftarans';

    protected $fillable = ['id_pendaftaran', 'id_pengguna',  'nama_lengkap', 
    'jenis_kelamin', 'status', 'tempat', 'tanggal_lahir', 'umur', 'alamat', 'pekerjaan', 
    'perusahaan', 'no_hp', 'agama', 'nama_keluarga', 'pekerjaan_keluarga', 'jenis_pendaftaran'];
}

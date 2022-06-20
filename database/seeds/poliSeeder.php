<?php

use Illuminate\Database\Seeder;

class poliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       
        $polis = [
            [
              'nama_poli' => 'Poli Umum',
              'jadwal_poli' => '24 Jam',
            ], 
            [
              'nama_poli' => 'Poli Gigi BPJS',
              'jadwal_poli' => 'Senin s/d Sabtu, 09.00 - 12.00 dan 13.30-16.30', 
            ],
            [
              'nama_poli' => 'Poli  Gigi Non BPJS',
              'jadwal_poli' => 'Senin s/d Sabtu, 09.00 - 12.00 dan 19.00-22.00 ',
            ], 
            [
              'nama_poli' => 'Poli Gigi KIA/KB',
              'jadwal_poli' => 'Senin s/d Sabtu, 08.00-10.00 dan 14.00-16.00', 
            ],
            [
              'nama_poli' => 'Poli Gizi',
              'jadwal_poli' => 'Senin s/d Sabtu, 19.00-22.00',
            ], 
            [
              'nama_poli' => 'Senam Hamil',
              'jadwal_poli' => 'Sabtu, 08.30-10.00', 
            ],
            [
              'nama_poli' => 'Konsultasi Ibu Menyusui',
              'jadwal_poli' => 'Sabtu, 10.00-11.00',
            ], 
            [
              'nama_poli' => 'Laboratorium',
              'jadwal_poli' => 'Senin s/d Sabtu, 08.00-22.00', 
            ],
            [
              'nama_poli' => 'Radiologi',
              'jadwal_poli' => 'Senin s/d Sabtu, 08.00-16.00',
            ], 
            [
              'nama_poli' => 'Apotek',
              'jadwal_poli' => '24 Jam', 
            ]
          ];

        foreach($polis as $poli){
             \App\poli::create($poli);
        }   
    }
}

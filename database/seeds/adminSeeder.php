<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\admin::truncate();
       
        $hash1 = Hash::make('admin');
        $hash2 = Hash::make('iqbal');

        $admins = [
            [
              'nama_admin' => 'admin',
              'username' => 'admin@admin',
              'password' => $hash1,
            ], 
            [
              'nama_admin' => 'iqbal',
              'username' => 'iqbal@admin',
              'password' => $hash2, 
            ]
          ];

        foreach($admins as $admin){
             \App\admin::create($admin);
        }   
       
        
    }
}

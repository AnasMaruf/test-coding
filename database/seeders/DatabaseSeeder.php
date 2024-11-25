<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Voucher;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    for ($i=1; $i <=7 ; $i++) {
        $payload = [
            'nama'=>'voucher-'.$i,
            'foto'=>'foto-'.$i.'.jpg',
            'kategori'=>'kategori-'.$i,
            'status'=>'nonaktif'
        ];
        Voucher::create([
            'nama' => $payload['nama'],
            'foto' => $payload['foto'],
            'kategori'=>$payload['kategori'],
            'status'=>$payload['status']
        ]);
    }

    }
}

<?php

use Illuminate\Database\Seeder;

class MunasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Company::insert([
            [
                'uuid' => '989b34d3-e3c4-48db-b409-62ace71bba86',
                'nama' => 'PT UJI COBA ABSENSI 1',
                'sippmi' => '123 TAHUN 2020',
                'alamat' => 'JL UJICOBA ABSENSI 1 BY DEVELOPER',
                'telp_kantor' => '02121231234',
                'telp_kantor2' => '02121231235',
                'surel' => 'ujicoba1@munasapjati.id', 
            ],
            
        ]);
        
        \App\Models\Member::insert([
            [
                'uuid' => '193cd90c-0ec8-4d8a-bce1-4b09800bda38',
                'nama' => 'DELEGASI 1',
                'company_id'  => '1',
                'no_hp' => '081212343214',
                'photo' => 'public/storage/photo/1603040036APJATI.jpg',
                'KEHADIRAN' => 'tidak_hadir',
            ],
        ]);

        \App\Models\Visitor::insert([
            [
                'uuid' => '53db4a5b-0812-45a1-8d74-4d2d1a9cba08',
                'nama' => 'PENGUNJUNG 1',
                'nik' => '3175123432143124',
                'phone' => '081231234123',
                'konfirmasi' => 'tidak_hadir',
            ],
        ]);
    }
}

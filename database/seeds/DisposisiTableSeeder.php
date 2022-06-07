<?php

use Illuminate\Database\Seeder;
use App\Models\Disposisi;
use \Carbon\Carbon;
class DisposisiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disposisi::truncate();

        $disposisi = [
            [
              'id' => 1,
              'nama_disposisi' => 'Disetujui Oleh Direktur',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              'id' => 2,
              'nama_disposisi' => 'Disetujui Oleh Sekretaris',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              'id' => 3,
              'nama_disposisi' => 'Disetujui Oleh HRGA',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
        ];

        Disposisi::insert($disposisi);
    }
}

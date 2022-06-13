<?php

use Illuminate\Database\Seeder;
use App\Models\Roles;
use \Carbon\Carbon;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::truncate();

        $roles = [
            [
              'id' => 1,
              'nama_role' => 'Administrator',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              'id' => 2,
              'nama_role' => 'Admin',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              'id' => 3,
              'nama_role' => 'User',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            // [
            //   'id' => 4,
            //   'nama_role' => 'Komisaris Utama',
            //   'created_at' => Carbon::now(),
            //   'updated_at' => Carbon::now(),
            // ],
            // [
            //   'id' => 5,
            //   'nama_role' => 'Direktur',
            //   'created_at' => Carbon::now(),
            //   'updated_at' => Carbon::now(),
            // ],
            // [
            //   'id' => 6,
            //   'nama_role' => 'Sekretaris',
            //   'created_at' => Carbon::now(),
            //   'updated_at' => Carbon::now(),
            // ],
        ];

        Roles::insert($roles);
    }
}

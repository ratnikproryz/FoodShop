<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'display_name' => 'System Administrator'],
            ['name' => 'user', 'display_name' => 'Customer'],
            ['name' => 'developer', 'display_name' => 'Developer'],
            ['name' => 'employee', 'display_name' => 'Employee'],
        ]);
    }
}

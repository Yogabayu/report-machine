<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([
            'name_site' => 'Reporting Machine',
            'name_business' => 'Reporting Machine',
            'address' => 'jalan jalan jalan',
            'tlp' => '086545628',
            'logo' => 'undefined',
        ]);
    }
}

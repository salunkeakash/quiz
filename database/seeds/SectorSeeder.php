<?php

use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['name' => 'BFSI'],
            ['name' => 'Logistics, E-commerce & Supply Chain'],
            ['name' => 'Information Technology'],
            ['name' => 'Hospitality & Hotel Management']
        ];

        foreach ($data as $item) {
            DB::table('sectors')->insert([
                'name' => $item,
            ]);
        }
    }
}

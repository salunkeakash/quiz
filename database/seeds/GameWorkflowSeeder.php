<?php

use Illuminate\Database\Seeder;

class GameWorkflowSeeder extends Seeder
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
            ['name' => 'workflow_1'],
            ['name' => 'workflow_2']
        ];

        foreach ($data as $item) {
            DB::table('gameworkflows')->insert([
                'name' => $item,
            ]);
        }
    }
}

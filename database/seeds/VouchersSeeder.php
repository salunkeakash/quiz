<?php

use Illuminate\Database\Seeder;

class VouchersSeeder extends Seeder
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
            ['min' => '1','max'=> '4', 'prize'=>'1,000' ,'voucher_code'=>'GDSDSHJ1D','msg'=>'We appreciate your enthusiasm! However, we recommend investing more time in yourself. Enhance your skills with TimesPro.'],
            ['min' => '5','max'=> '7', 'prize'=>'2,500' ,'voucher_code'=>'GDSDSHJ2D','msg'=>"You're nearly there! A little extra effort, and you'll be well-prepared in no time. Explore TimesPro programs to become job-ready"],
            ['min' => '8','max'=> '10', 'prize'=>'5,000' ,'voucher_code'=>'GDSDSHJ5D','msg'=>"Congratulations, you're job-ready! Visit TimesPro to discover programs that can jumpstart your career."]
        ];

        foreach ($data as $item) {
            DB::table('vouchers')->insert([
                'min_score' => $item['min'],
                'max_score' => $item['max'],
                'prize' => $item['prize'],
                'voucher_code' => $item['voucher_code'],
                'msg' => $item['msg'],
            ]);
        }
    }
}

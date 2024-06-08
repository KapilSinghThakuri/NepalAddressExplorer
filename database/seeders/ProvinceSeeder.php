<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'province_code'=>1,
                'province_name_nep'=>'प्रदेश नं. १',
                'province_name_eng'=>'Province No. 1',
            ],
            [
                'province_code'=>3,
                'province_name_nep'=>'मधेश प्रदेश',
                'province_name_eng'=>'Madhesh',
            ],
            [
                'province_code'=>3,
                'province_name_nep'=>'बााग्मती प्रदेश',
                'province_name_eng'=>'Bagmati',
            ],
            [
                'province_code'=>4,
                'province_name_nep'=>'गण्डकी प्रदेश',
                'province_name_eng'=>'Gandaki',
            ],
            [
                'province_code'=>5,
                'province_name_nep'=>'लुम्बिनि प्रदेश',
                'province_name_eng'=>'Lumbini',
            ],
            [
                'province_code'=>6,
                'province_name_nep'=>'कर्णाली प्रदेश',
                'province_name_eng'=>'Karnali',
            ],
            [
                'province_code'=>7,
                'province_name_nep'=>'सुदुरपश्चिम प्रदेश',
                'province_name_eng'=>'Sudurpaschim',
            ]
        ];
        DB::table('provinces')->insert($rows);
    }
}

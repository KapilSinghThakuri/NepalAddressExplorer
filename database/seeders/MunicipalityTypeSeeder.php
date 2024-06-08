<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MunicipalityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipalityTypes = [
            [
                'id'=>1,
                'municipality_type_name_nep'=>'महानगरपालिका',
                'municipality_type_name_eng'=>'Metropolitan'
            ],
            [
                'id'=>2,
                'municipality_type_name_nep'=>'उपमहानगरपालिका',
                'municipality_type_name_eng'=>'Sub-Metropolitan'
            ],
            [
                'id'=>3,
                'municipality_type_name_nep'=>'नगरपालिका',
                'municipality_type_name_eng'=>'Municipality'
            ],
            [
                'id'=>4,
                'municipality_type_name_nep'=>'गाउँपालिका',
                'municipality_type_name_eng'=>'Rural Municipality'
            ]
        ];

        DB::table('municipality_types')->insert($municipalityTypes);
   }
}

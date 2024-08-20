<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurgeryTypesTableSeeder extends Seeder
{
    public function run(): void
    {
        $surgeryTypes = [
            'EL LSCS',
            'EM LSCS',
            'TAH',
            'VH & R',
            'Laparotomy-Explorative',
            'D & C',
            'D & E',
            'TAH & BSO',
            'Laparoscopy & Dye test',
            'Myomectomy',
            'LRT',
            'Cervical biopsy',
            'Endometrial biopsy',
            'Others',
            'LAP LRT',
            'Laparoscopic assisted VH (LAVH)',
            'Hysteroscopy-Diagnostic',
            'Laparoscopy-Diagnostic',
            'Laparoscopic surgery for ectopic pregnancy',
            'Cervical cerclage',
            'ERPC',
            'Total laparoscopic hysterectomy',
            'Anterior colporrhaphy',
            'Posterior colpoperineorrhaphy',
            'Manchester repair',
            'Laparoscopic cystectomy hysteroscopy resection of polyp or submucosal fibroid',
            'Burchcolposuspension'
        ];

        foreach ($surgeryTypes as $surgeryType) {
            DB::table('surgery_types')->updateOrInsert(
                ['surgery_name' => $surgeryType],
                ['surgery_name' => $surgeryType] // You can update other fields if necessary
            );
        }
    }
}

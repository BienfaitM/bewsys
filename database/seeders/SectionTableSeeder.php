<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            'Core Values',
            'Workplace Competencies',
            'Company Culture',
            'Role Specific Technical Know How',
            'Leadership Skills'
        ];
        
        foreach ($sections as $section){
            Section::create(['Section_Name'=>$section]);

        }
        //
    }
}

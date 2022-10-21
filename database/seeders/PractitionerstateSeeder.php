<?php

namespace Database\Seeders;

use App\Models\Practitionerstate;
use Illuminate\Database\Seeder;

class PractitionerstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Practitionerstate::create([
            'name'=>'deceased'
        ]);
        Practitionerstate::create([
            'name'=>'incumbent'
        ]);
        Practitionerstate::create([
            'name'=>'removed'
        ]);
        Practitionerstate::create([
            'name'=>'retired'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class Students_SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Student::class,300)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => Str::random(10),
            'credit' => 3
        ]);
        DB::table('subjects')->insert([
            'name' => Str::random(10),
            'credit' => 4
        ]);
        DB::table('subjects')->insert([
            'name' => Str::random(10),
            'credit' => 2
        ]);
        DB::table('subjects')->insert([
            'name' => Str::random(10),
            'credit' => 3
        ]);
        DB::table('subjects')->insert([
            'name' => Str::random(10),
            'credit' => 2
        ]);
        DB::table('subjects')->insert([
            'name' => Str::random(10),
            'credit' => 3
        ]);
        DB::table('subjects')->insert([
            'name' => Str::random(10),
            'credit' => 4
        ]);
        DB::table('subjects')->insert([
            'name' => Str::random(10),
            'credit' => 2
        ]);
        DB::table('subjects')->insert([
            'name' => Str::random(10),
            'credit' => 1
        ]);
    }
}

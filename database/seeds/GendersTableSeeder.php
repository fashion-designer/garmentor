<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GendersTableSeeder extends Seeder
{
    const DEFAULT_GENDERS = [
        'male',
        'female',
        'trans',
        'trans female',
        'trans male',
        'trans person',
        'bi gender',
        'non binary',
        'neither',
        'other'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::DEFAULT_GENDERS as $gender)
        {
            DB::table('genders')->insert(['name' => $gender]);
        }
    }
}

<?php

use ReclutaTI\Gender;
use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'name' => 'femenino'
        	],

        	[
        		'name' => 'masculino'
        	]
        ];

        foreach ($data as $item) {
        	Gender::create($item);
        }
    }
}

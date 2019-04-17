<?php

use Illuminate\Database\Seeder;

class ComputersTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('computers')->insert([
            'ref' => Str::random(4),
        ]);

        DB::table('computers')->insert([
            'ref' => Str::random(4),
        ]);

        DB::table('computers')->insert([
            'ref' => Str::random(4),
        ]);

        DB::table('computers')->insert([
            'ref' => Str::random(4),
        ]);

        DB::table('computers')->insert([
            'ref' => Str::random(4),
        ]);

        DB::table('computers')->insert([
            'ref' => Str::random(4),
        ]);
    }
}

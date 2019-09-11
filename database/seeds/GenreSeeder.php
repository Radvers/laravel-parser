<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            [
                'name' => "Биографические",
                'created_at' => date('Y-m-d h:i:s', time())
            ],
            [
                'name' => "Драмы",
                'created_at' => date('Y-m-d h:i:s', time())
            ],
            [
                'name' => "Криминальные",
                'created_at' => date('Y-m-d h:i:s', time())
            ],
        ]);
    }
}

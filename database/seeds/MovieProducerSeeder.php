<?php

use Illuminate\Database\Seeder;

class MovieProducerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie_producer')->insert([
            [
                'movie_id' => 1,
                'producer_id' => 1,
                'created_at' => date('Y-m-d h:i:s', time())
            ],
        ]);
    }
}

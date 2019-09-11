<?php

use Illuminate\Database\Seeder;

class MovieActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actor_movie')->insert([
            [
                'movie_id' => 1,
                'actor_id' => 1,
                'created_at' => date('Y-m-d h:i:s', time())
            ],
            [
                'movie_id' => 1,
                'actor_id' => 2,
                'created_at' => date('Y-m-d h:i:s', time())
            ],
            [
                'movie_id' => 1,
                'actor_id' => 3,
                'created_at' => date('Y-m-d h:i:s', time())
            ],
            [
                'movie_id' => 1,
                'actor_id' => 4,
                'created_at' => date('Y-m-d h:i:s', time())
            ],
        ]);
    }
}

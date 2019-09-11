<?php

use Illuminate\Database\Seeder;

class MovieGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genre_movie')->insert([
            [
                'movie_id' => 1,
                'genre_id' => 1,
                'created_at' => date('Y-m-d h:i:s', time())
            ],
            [
                'movie_id' => 1,
                'genre_id' => 2,
                'created_at' => date('Y-m-d h:i:s', time())
            ],[
                'movie_id' => 1,
                'genre_id' => 3,
                'created_at' => date('Y-m-d h:i:s', time())
            ],
        ]);
    }
}

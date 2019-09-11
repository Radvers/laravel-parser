<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ActorSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(ProducerSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(MovieActorSeeder::class);
        $this->call(MovieGenreSeeder::class);
        $this->call(MovieProducerSeeder::class);
    }
}

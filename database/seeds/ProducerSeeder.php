<?php

use Illuminate\Database\Seeder;

class ProducerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producers')->insert([
            [
                'name' => "Марко Беллоккьо",
                'created_at' => date('Y-m-d h:i:s', time())
            ],
        ]);
    }
}

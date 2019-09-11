<?php

use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actors')->insert([
            [
                'name' => "Марко Беллоккьо",
                'created_at' => date('Y-m-d h:i:s', time())
            ],
            [
                'name' => "Пьерфранческо Фавино",
                'created_at' => date('Y-m-d h:i:s', time())
            ],
            [
                'name' => "Луиджи Ло Кашио",
                'created_at' => date('Y-m-d h:i:s', time())
            ],
            [
                'name' => "Мария Фернанда Кандиду",
                'created_at' => date('Y-m-d h:i:s', time())
            ],
        ]);
    }
}

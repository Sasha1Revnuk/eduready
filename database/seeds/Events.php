<?php

use Illuminate\Database\Seeder;

class Events extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'title' => 'Подія 1',
            'text' => 'С другой стороны начало повседневной работы по формированию позиции в значительной степени',
            'time' => '13:00 - 13:30',
            'day' => '25',
            'month' => 'Липень',
            'img' => 'event1.jpg'
        ]);
        DB::table('events')->insert([
            'title' => 'Подія 2',
            'text' => 'Разнообразный и богатый опыт рамки и место обучения кадров в значительной',
            'time' => '15:00 - 15:50',
            'day' => '13',
            'month' => 'Вересень',
            'img' => 'event2.jpg'
        ]);
    }
}

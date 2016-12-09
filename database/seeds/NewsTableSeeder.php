<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\News::create([
            'title' => 'Notícia 1',
            'description' => 'Descrição da notícia numero 1',
            'image' => 'imagem1.jpg'
        ]);

        \App\News::create([
            'title' => 'Notícia 2',
            'description' => 'Descrição da notícia numero 2',
            'image' => 'imagem2.jpg'
        ]);

        \App\News::create([
            'title' => 'Notícia 3',
            'description' => 'Descrição da notícia numero 3',
            'image' => 'imagem3.jpg'
        ]);


        \App\News::create([
            'title' => 'Notícia 4',
            'description' => 'Descrição da notícia numero 4',
            'image' => 'imagem4.jpg'
        ]);

        \App\News::create([
            'title' => 'Notícia 5',
            'description' => 'Descrição da notícia numero 5',
            'image' => 'imagem5.jpg'
        ]);

        \App\News::create([
            'title' => 'Notícia 6',
            'description' => 'Descrição da notícia numero 6',
            'image' => 'imagem6.jpg'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'user_id' => 1,
            'title' => 'Bienvenida al sistema',
            'content' => 'Este es un pensamiento inicial sobre la arquitectura web limpia con Laravel y MariaDB.',
            'type' => 'pensamiento',
        ]);

        Post::create([
            'user_id' => 2,
            'title' => 'Nota de desarrollo',
            'content' => 'Recordar verificar los parámetros de conexión en la base de datos MariaDB.',
            'type' => 'nota',
        ]);
    }
}
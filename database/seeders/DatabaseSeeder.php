<?php

namespace Database\Seeders;

use App\Models\Quack;
use App\Models\Quashtag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();
        $quacks = Quack::factory(100)->create();
        $quashtags = Quashtag::factory(40)->create();

        foreach ($quacks as $quack) {
            $quavsAleatorios = $users->random(5);
            $requacksAleatorios = $users->random(rand(0,5));
            $quashtagsAleatorios = $quashtags->random(2);
<<<<<<< HEAD

=======
            
>>>>>>> develop
            $comentarios = $users->random(rand(0,3));

            $quack->usersRequacked()->attach($requacksAleatorios);
            $quack->usersQuaved()->attach($quavsAleatorios);
            $quack->quashtags()->attach($quashtagsAleatorios);

            foreach($comentarios as $user){
                $user->quacksComentados()->attach($quack->id, [
                    'contenido' => fake()->sentence()
                ]);
            }
        }

        foreach ($users as $user) {
            $seguidoresAleatorios = $users->where('id', '!=', $user->id)->random(rand(0,5));
            $user->siguiendo()->attach($seguidoresAleatorios);
        }
    }
}

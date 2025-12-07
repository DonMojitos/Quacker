<?php

namespace Database\Seeders;

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

        Quashtag::factory(10)->create();

        // Creamos 10 usuarios aleatorios usando tu fábrica
        // (La fábrica ya sabe que tiene que usar 'nombre' y 'usuario')
        User::factory(10)->create();
    }
}

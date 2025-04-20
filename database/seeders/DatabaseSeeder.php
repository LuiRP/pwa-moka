<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'telefono' => '1234-5678',
            'permiso' => '0'
        ]);

        Categoria::factory()->create([
            'nombre' => 'Postre',
            'id' => '1'
        ]);

        Producto::factory(12)->create([
            'nombre' => fake()->firstNameFemale(),
            'categoria_id' => 1,
            'precio' => 5,
            'descripcion' => fake()->paragraph(3),
            'imagen' => 'images/uploads/1745118941.jpg'
        ]);
    }
}

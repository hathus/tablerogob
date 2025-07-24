<?php

namespace Database\Seeders;

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
            'name' => 'Administrador',
            'email' => 'admin@example.com',
        ]);

        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Test1',
            'email' => 'test1@example.com',
        ]);

        User::factory()->create([
            'name' => 'Test2',
            'email' => 'test2@example.com',
        ]);

        User::factory()->create([
            'name' => 'Test3',
            'email' => 'test3@example.com',
        ]);

        User::factory()->create([
            'name' => 'Test4',
            'email' => 'test4@example.com',
        ]);

        User::factory()->create([
            'name' => 'Test5',
            'email' => 'test5@example.com',
        ]);

        User::factory()->create([
            'name' => 'Test6',
            'email' => 'test6@example.com',
        ]);

        $this->call([
            MunicipioSeeder::class,
            EjeSeeder::class,
            DependenciaSeeder::class,
            DependenciaSectorSeeder::class,
            CompromisoSeeder::class,
            TipoCompromisoSeeder::class,
            OdsConceptoSeeder::class,
            UnidadMedidasSeeder::class,
        ]);
    }
}

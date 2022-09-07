<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Infrastructure\Models\User;
use App\Infrastructure\Models\Produto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->create();
        // Fornecedor::factory()->create();
        Produto::factory(20)->create();
        // Cliente::factory()->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\User\Models\User;
use App\Domain\Cliente\Models\Cliente;
use App\Domain\Produto\Models\Produto;
use App\Domain\Fornecedor\Models\Fornecedor;
use App\Domain\CentroCusto\Models\CentroCusto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();
        Fornecedor::factory()->create();
        Produto::factory()->create();
        Cliente::factory()->create();
    }
}

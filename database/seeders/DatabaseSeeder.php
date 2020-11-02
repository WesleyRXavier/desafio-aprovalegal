<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
         \App\Models\Empresa::factory(10)->create();
         \App\Models\Setor::factory(10)->create();
         \App\Models\Funcionario::factory(10)->create();
    }
}

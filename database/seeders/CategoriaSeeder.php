<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [
                'descricao' => 'Tecnologia'
            ],
            [
                'descricao' => 'Eletrodomestico'
            ],
        ];

        foreach ($categorias as $categoria) {
            Categorias::UpdateOrCreate($categoria, $categoria);
        }
    }
}

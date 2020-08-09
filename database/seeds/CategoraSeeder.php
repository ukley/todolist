<?php

use Illuminate\Database\Seeder;

class CategoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat=['Casa','Rua','Trabalho'];

        foreach($cat as $item) {
            DB::table('categorias')->insert([
                'categorias' => $item,
            ]);

        }
    }
}

<?php

use Illuminate\Database\Seeder;

class DadosFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cbos')->insertGetId([
            'codigo' => '012344',
            'descricao' => "Dentista",
        ]);

        DB::table('cbos')->insertGetId([
            'codigo' => '22222',
            'descricao' => "Médico",
        ]);

        DB::table('tipos')->insertGetId([
                'descricao' => "Emprego Público",
        ]);
        DB::table('tipos')->insertGetId([
            'descricao' => "Estatuário",
        ]);

        DB::table('vinculacoes')->insertGetId([
            'descricao' => "Vínculo Empregatício",
        ]);

        DB::table('vinculacoes')->insertGetId([
            'descricao' => "Residência",
        ]);
    }
}

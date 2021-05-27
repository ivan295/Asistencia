<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

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
        DB::table('type_users')->insert([
            'descripcion'=>'admin',
        ]);
        DB::table('building')->insert([
            'descripcion'=>'Palacio Municipal',
        ]);
        DB::table('department')->insert([
            'descripcion'=>'TIC',
        ]);
        DB::table('users')->insert([
            'name'=>'ivan',
            'apellido'=>'cobena',
            'cedula'=>'111111111',
            'direccion'=>'junin',
            'sexo'=>'Masculino',
            'email'=>'r.cobena@junin.gob.ec',
            'password'=>bcrypt('123456+'),
            'id_tipouser'=>'1',
            'id_edificio'=>'1',
            'id_departamento'=>'1',
        ]);
        DB::table('modality')->insert([
            'descripcion'=>'Presencial',
            'estado'=>'True',
        ]);
        DB::table('modality')->insert([
            'descripcion'=>'Teletrabajo',
            'estado'=>'True',
        ]);
        DB::table('modality')->insert([
            'descripcion'=>'Sin registro',
            'estado'=>'False',
        ]);
        DB::table('assistance_status')->insert([
            'descripcion' =>'Ingreso',
        ]);
        DB::table('register_status')->insert([
            'descripcion' =>'Aprobado',
        ]);
        
       
    }
}

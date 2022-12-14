<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('type_tickets')->insert([
            ['id'=>4,'name' => 'Suporte','description'=>'Suporte','role_id'=>0],
            ['id'=>5,'name' => 'Vendas','description'=>'Vendas','role_id'=>0],
            ['id'=>6,'name' => 'Pagamentos','description'=>'Pagamentos','role_id'=>0],
           ]);

           DB::table('roles')->insert([
            ['id'=>1,'name' => 'admin',],
            ['id'=>2,'name' => 'organization',],
            ['id'=>3,'name' => 'manager',],
            ['id'=>4,'name' => 'employee',],
           ]);

           DB::table('provinces')->insert([
            ['name' => 'Maputo Cidade',],
            ['name' => 'Maputo Província',],
            ['name' => 'Inhambane',],
            ['name' => 'Gaza',],
            ['name' => 'Sofala',],
            ['name' => 'Manica',],
            ['name' => 'Tete',],
            ['name' => 'Zambézia',],
            ['name' => 'Nampula',],
            ['name' => 'Delgado',],
            ['name' => 'Cabo',],
            ['name' => 'Niassa',],
           ]);

           DB::table('countries')->insert([
            ['name' => 'Mozambique',],
            ['name' => 'South Africa',],
            
           ]);
    }
}

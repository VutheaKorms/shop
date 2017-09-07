<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([

            // Phnom Penh
            [
                'name' => 'Chamkar Mon',
                'description' => 'Chamkar Mon',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Phnom Penh')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Doun Penh',
                'description' => 'Doun Penh',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Phnom Penh')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Prampir Meakkakra',
                'description' => 'Prampir Meakkakra',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Phnom Penh')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Tuol Kouk',
                'description' => 'Tuol Kouk',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Phnom Penh')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Dangkao',
                'description' => 'Dangkao',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Phnom Penh')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Mean Chey',
                'description' => 'Mean Chey',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Phnom Penh')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ruessei Kaev',
                'description' => 'Ruessei Kaev',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Phnom Penh')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Sen Sok',
                'description' => 'Sen Sok',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Phnom Penh')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pou Senchey',
                'description' => 'Pou Senchey',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Phnom Penh')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Chrouy Changvar',
                'description' => 'Chrouy Changvar',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Phnom Penh')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Preaek Pnov',
                'description' => 'Preaek Pnov',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Phnom Penh')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Chbar Ampov',
                'description' => 'Chbar Ampov',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Phnom Penh')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            // Banteay Meanchey

            [
                'name' => 'Mongkol Borei',
                'description' => 'Mongkol Borei',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Banteay Meanchey')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Phnum Srok',
                'description' => 'Phnum Srok',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Banteay Meanchey')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Preah Netr Preah',
                'description' => 'Preah Netr Preah',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Banteay Meanchey')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ou Chrov',
                'description' => 'Ou Chrov',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Banteay Meanchey')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Krong Serei Saophoan',
                'description' => 'Krong Serei Saophoan',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Banteay Meanchey')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Thma Puok',
                'description' => 'Thma Puok',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Banteay Meanchey')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Svay Chek',
                'description' => 'Svay Chek',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Banteay Meanchey')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Malai',
                'description' => 'Malai',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Banteay Meanchey')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Krong Paoy Paet',
                'description' => 'Krong Paoy Paet',
                'country_id' =>  DB::table('countries')->select('id')->where('name','Banteay Meanchey')->first()->id,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],




        ]);
    }
}

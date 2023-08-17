<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('companies')->insert([
            'id' => '1',
            'company_name' => 'サントリー',
            'street_address' =>'東京都品川区',
            'representative_name' => '品川太郎'
        ]);

        \DB::table('companies')->insert([
            'id' => '2',
            'company_name' => '伊藤園',
            'street_address' =>'大阪府大阪市',
            'representative_name' => '大阪花子'
        ]);


        \DB::table('companies')->insert([
            'id' => '3',
            'company_name' => 'アサヒ',
            'street_address' =>'愛知県名古屋市',
            'representative_name' => '名古屋史郎'
        ]);


    }
}

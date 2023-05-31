<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert([
            'id' =>'1',
            'company_id' =>'2',
            'product_name' =>'コーヒー',
            'price' => '110',
            'stock' =>'10',
            'comment' =>'テストコーヒー',
            'img_path' => ''

        ]);


        \DB::table('products')->insert([
            'id' =>'2',
            'company_id' =>'1',
            'product_name' =>'紅茶',
            'price' => '120',
            'stock' =>'12',
            'comment' =>'テスト紅茶',
            'img_path' => ''

        ]);

        \DB::table('products')->insert([
            'id' =>'3',
            'company_id' =>'3',
            'product_name' =>'ハイボール',
            'price' => '130',
            'stock' =>'13',
            'comment' =>'テストハイボール',
            'img_path' => ''

        ]);
    }
}

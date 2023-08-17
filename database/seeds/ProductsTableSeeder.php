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

        \DB::table('products')->insert([
            'id' =>'4',
            'company_id' =>'3',
            'product_name' =>'コーラ',
            'price' => '130',
            'stock' =>'13',
            'comment' =>'テストコーラ',
            'img_path' => ''

        ]);

        \DB::table('products')->insert([
            'id' =>'5',
            'company_id' =>'3',
            'product_name' =>'チャイ',
            'price' => '130',
            'stock' =>'13',
            'comment' =>'テストチャイ',
            'img_path' => ''

        ]);

        \DB::table('products')->insert([
            'id' =>'6',
            'company_id' =>'3',
            'product_name' =>'アールグレイ',
            'price' => '130',
            'stock' =>'13',
            'comment' =>'テストアールグレイ',
            'img_path' => ''

        ]);

        \DB::table('products')->insert([
            'id' =>'7',
            'company_id' =>'3',
            'product_name' =>'水',
            'price' => '130',
            'stock' =>'13',
            'comment' =>'テスト水',
            'img_path' => ''

        ]);
    }
}

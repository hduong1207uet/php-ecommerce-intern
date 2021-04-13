<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $products = [
            ['name' => 'Ba đờn T350', 'price' => '350', 'supplier' => 'Ba Đờn', 'category_id' => '1', 'avg_rate' => '0', 'description' => 'Mặt top: spruce solid ,Khóa đúc, lưng gỗ ép'],
            ['name' => 'Epiphone Dove', 'price' => '220', 'supplier' => 'Epiphone', 'category_id' => '1', 'avg_rate' => '0', 'description' => 'Mặt top: koa solid ,Khóa Dejung, lưng gỗ ép hồng đào'],
            ['name' => 'Epiphone DR-100', 'price' => '800', 'supplier' => 'Epiphone', 'category_id' => '1', 'avg_rate' => '0', 'description' => 'Mặt top: koa solid ,Khóa đúc, lưng gỗ ép cẩm Ấn'],
        ];

        DB::table('products')->insert($products);
        Schema::enableForeignKeyConstraints();
    }
}

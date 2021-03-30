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
            ['id' => 'T350', 'name' => 'Ba đờn T350', 'price' => '350', 'category_id' => '1', 'avg_rate' => '0', 'description' => 'Mặt top: spruce solid ,Khóa đúc, lưng gỗ ép'],
            ['id' => 'C350', 'name' => 'Epiphone Dove', 'price' => '220', 'category_id' => '1', 'avg_rate' => '0', 'description' => 'Mặt top: koa solid ,Khóa Dejung, lưng gỗ ép hồng đào'],
        ];

        DB::table('products')->insert($products);
        Schema::enableForeignKeyConstraints();
    }
}

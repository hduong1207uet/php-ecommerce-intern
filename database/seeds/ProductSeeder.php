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
            ['name' => 'Taylor 114CE', 'price' => '1800', 'supplier' => 'Taylor', 'category_id' => '1', 'avg_rate' => '0', 'featured_img' => 'TAYLOR114CE.jpg', 'description' => 'Mặt top: gỗ ép cẩm Ấn ,Khóa Dejung, lưng gỗ Rosewood'],
            ['name' => 'Ba đờn T350', 'price' => '350', 'supplier' => 'Ba Đờn', 'category_id' => '1', 'avg_rate' => '0', 'featured_img' => 'BADONT350.jpg', 'description' => 'Mặt top: spruce solid ,Khóa đúc, lưng gỗ ép'],
            ['name' => 'Epiphone Dove', 'price' => '220', 'supplier' => 'Epiphone', 'category_id' => '1', 'avg_rate' => '0', 'featured_img' => 'EPIPHONEDOVE.jpg', 'description' => 'Mặt top: koa solid ,Khóa Dejung, lưng gỗ ép hồng đào'],
            ['name' => 'Epiphone DR-100', 'price' => '800', 'supplier' => 'Epiphone', 'category_id' => '1', 'avg_rate' => '0', 'featured_img' => 'EPIPHONEDR100.jpg', 'description' => 'Mặt top: koa solid ,Khóa đúc, lưng gỗ ép cẩm Ấn'],
            ['name' => 'Taylor 214C', 'price' => '1800', 'supplier' => 'Taylor', 'category_id' => '2', 'avg_rate' => '0', 'featured_img' => 'Taylor214C.jpg', 'description' => 'Mặt top: gỗ ép cẩm Ấn ,Khóa Dejung, lưng gỗ Rosewood'],
            ['name' => 'Ba Đờn C200', 'price' => '200', 'supplier' => 'Ba Đờn', 'category_id' => '2', 'avg_rate' => '0', 'featured_img' => 'BADONC200.jpg', 'description' => 'Mặt top: gỗ thông ,Khóa Dejung, lưng gỗ  vân sam'],
            ['name' => 'Taylor 280C', 'price' => '280', 'supplier' => 'Taylor', 'category_id' => '2', 'avg_rate' => '0', 'featured_img' => 'TAYLORC280.jpg', 'description' => 'Mặt top: gỗ điệp già, Khóa Dejung, lưng gỗ Rosewood'],
            ['name' => 'Guitar Trần C500', 'price' => '500', 'supplier' => 'Guitar Trần', 'category_id' => '2', 'avg_rate' => '0', 'featured_img' => 'TRANC500.jpg', 'description' => 'Mặt top: gỗ ép cẩm Ấn ,Khóa Dejung, lưng gỗ Rosewood'],
        ];

        DB::table('products')->insert($products);
        Schema::enableForeignKeyConstraints();
    }
}

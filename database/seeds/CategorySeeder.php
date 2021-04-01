<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $categories = [
            ['type' => 'Acoustic', 'description' => 'Dòng guitar Acoustic dùng chơi nhạc trẻ sẽ hay hơn.'],
            ['type' => 'Classic', 'description' => 'Dòng guitar Classic dùng chơi nhạc cổ điển sẽ hay hơn.'],
        ];

        DB::table('categories')->insert($categories);
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $posts = [
            ['name' => 'Hoang Van Duong', 'email' => 'hduong1207.uet@gmail.com', 'email_verified_at' => '2016-06-30 00:00:00', 'password'=> '12071998', 'phone_number'=> '0365749738', 'avatar' => ''],
            ['name' => 'Nguyen Van Bach', 'email' => 'bach98@gmail.com', 'email_verified_at' => '2016-06-30 00:00:00', 'password'=> '31071998', 'phone_number'=> '0985223669', 'avatar' => ''],
        ];

        DB::table('users')->insert($posts);
        Schema::enableForeignKeyConstraints();
    }
}

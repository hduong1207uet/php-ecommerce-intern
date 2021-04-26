<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $roles = [
            ['name' => 'admin'],
            ['name' => 'user'],
        ];

        DB::table('roles')->insert($roles);
        Schema::enableForeignKeyConstraints();
    }
}

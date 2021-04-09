<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablesStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });
        
        Schema::table('products', function (Blueprint $table) {
            $table->float('avg_rate')->nullable()->change();
        });

        Schema::table('images', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });

        Schema::table('vouchers', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->text('description')->change();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->float('avg_rate')->change();     
        });

        Schema::table('images', function (Blueprint $table) {
            $table->text('description')->change();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->text('description')->change();
        });

        Schema::table('vouchers', function (Blueprint $table) {
            $table->text('description')->change();
        });
    }
}

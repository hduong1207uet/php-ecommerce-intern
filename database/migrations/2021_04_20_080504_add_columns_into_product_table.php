<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsIntoProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('top_side')->nullable();
            $table->string('back_side')->nullable();
            $table->string('hip_side')->nullable();
            $table->string('strings')->nullable();
            $table->string('neck')->nullable();
            $table->string('buckcle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('top_side');
            $table->dropColumn('back_side');
            $table->dropColumn('hip_side');
            $table->dropColumn('strings');
            $table->dropColumn('neck');
            $table->dropColumn('buckcle');
        });
    }
}

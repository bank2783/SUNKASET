<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preorder_lists', function (Blueprint $table) {
            $table->string('pre_product_id')->after('pre_list_image');
            $table->string('user_id')->after('pre_product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preorder_lists', function (Blueprint $table) {
            //
        });
    }
};

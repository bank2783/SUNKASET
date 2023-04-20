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
        Schema::create('preorder_lists', function (Blueprint $table) {
            $table->id();
            $table->string('pre_list_name');
            $table->integer('pre_list_price');
            $table->integer('pre_list_amount');
            $table->string('pre_list_image');
            $table->string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preorder_lists');
    }
};

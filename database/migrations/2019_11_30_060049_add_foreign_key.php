<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('goods',function(Blueprint $table){
            $table->foreign('categories_id')->references('id')->on('categories')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('goods',function(Blueprint $table) {
            $table->dropForeign('goods_user_id_foreign');
            $table->dropForeign('goods_categories_id_foreign');
            $table->dropForeign('goods_brand_id_foreign');
        });
    }
}

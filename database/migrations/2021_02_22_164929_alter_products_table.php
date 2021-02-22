<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price2', 9, 2)->nullable()->after('price');
            $table->boolean('disable_prices')->default(false)->after('price2');
            $table->boolean('disable_price1')->default(false)->after('disable_prices');
            $table->boolean('disable_price2')->default(false)->after('disable_price1');
            $table->integer('parent_id')->unsigned()->nullable()->after('homepage');
            $table->integer('lft')->unsigned()->nullable()->after('parent_id');
            $table->integer('rgt')->unsigned()->nullable()->after('lft');
            $table->integer('depth')->unsigned()->nullable()->after('rgt');
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
            $table->dropColumn(['price2']);
            $table->dropColumn(['disable_prices']);
            $table->dropColumn(['disable_price1']);
            $table->dropColumn(['disable_price2']);
            $table->dropColumn(['parent_id']);
            $table->dropColumn(['lft']);
            $table->dropColumn(['rgt']);
            $table->dropColumn(['depth']);
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalDetailsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('visible_price')->nullable()->after('price');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('visible_in_nav')->default(1)->before('created_at');
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
            $table->dropColumn(['visible_price']);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['visible_in_nav']);
        });
    }
}

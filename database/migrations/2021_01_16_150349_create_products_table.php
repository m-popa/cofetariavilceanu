<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->longText('description');
            $table->decimal('price', 9, 2);
            $table->integer('price_type')->default(1)->nullable();
            $table->string('sku')->nullable();
            $table->boolean('active')->default(true);
            $table->string('stock')->default('1');
            $table->string('slug')->nullable();
            $table->boolean('homepage')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('products');
        // Schema::enableForeignKeyConstraints();
    }
}

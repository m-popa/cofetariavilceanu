<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nume');
            $table->string('detalii_persoana')->nullable();
            $table->string('numar_telefon')->nullable();
            $table->longText('detalii')->nullable();
            $table->longText('detalii_finisare')->nullable();
            $table->string('mesaj')->nullable();
            $table->boolean('livrare')->default(false);
            $table->longText('adresa')->nullable();
            $table->string('ora')->nullable();
            $table->decimal('avans', 9, 2)->nullable();
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
        Schema::dropIfExists('orders');
    }
}

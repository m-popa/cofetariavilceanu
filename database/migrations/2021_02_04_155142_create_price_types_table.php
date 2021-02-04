<?php

use App\Models\PriceType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $this->createPriceTypes();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_types');
    }

    protected function createPriceTypes()
    {
        $types = ['Bucată', 'Kg', '100g'];
        foreach ($types as $type) {
            PriceType::create(['name' => $type]);
        }
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Countries', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Name');
            $table->string('IsoCodeOne', 10)->nullable();
            $table->string('IsoCodeTwo', 10)->nullable();
            $table->string('PostCode', 10)->nullable();
            $table->tinyInteger('Status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Countries');
    }
}

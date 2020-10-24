<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Roles', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Name');
            $table->text('Description')->nullable();
            $table->tinyInteger('Status')->default(1);         
            $table->dateTime('CreatedAt')->nullable()->default(null);
            $table->dateTime('UpdatedAt')->nullable()->default(null);
            $table->dateTime('DeletedAt')->nullable()->default(null);
            $table->unsignedBigInteger('CreatedBy')->default(0);
            $table->unsignedBigInteger('UpdatedBy')->default(0);
            $table->unsignedBigInteger('DeletedBy')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Roles');
    }
}

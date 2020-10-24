<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Skills', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Title');
            $table->text('Description');
            $table->tinyInteger('Status')->default(1);
            $table->unsignedBigInteger('UserId');       
            $table->foreign('UserId')->references('Id')->on('Users');           
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
        Schema::dropIfExists('Skills');
    }
}

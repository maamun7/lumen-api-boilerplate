<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserRole', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->unsignedBigInteger('UserId');
            $table->foreign('UserId')->references('Id')->on('Users');
            $table->unsignedBigInteger('RoleId');       
            $table->foreign('RoleId')->references('Id')->on('Roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UserRole');
    }
}

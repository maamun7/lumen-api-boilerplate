<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RolePermission', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->unsignedBigInteger('RoleId');       
            $table->foreign('RoleId')->references('Id')->on('Roles');
            $table->unsignedBigInteger('PermissionId');       
            $table->foreign('PermissionId')->references('Id')->on('Permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RolePermission');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Username', 50)->unique()->nullable();
            $table->string('Email', 150)->unique()->nullable();
            $table->string('MobileNo', 14)->unique();
            $table->string('Password');
            $table->string('Salt', 20)->nullable();
            $table->tinyInteger('UserType')->default(0); 
            $table->tinyInteger('Status')->default(1)->comment('1 = Active, 2 = Inactive, 0 = Delete');
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
        Schema::dropIfExists('Users');
    }
}

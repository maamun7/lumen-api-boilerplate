<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('UserId');       
            $table->foreign('UserId')->references('Id')->on('Users');
            $table->string('Token');
            $table->string('Client');
            $table->dateTime('StartedAt')->nullable()->default(null);
            $table->dateTime('ExpireAt')->nullable()->default(null);
            $table->tinyInteger('IsExpire')->default(0)->comment('0 = Alive, 1 = Expire');
            $table->tinyInteger('SendTo')->nullable()->comment('0 = Email, 1 = Mobile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tokens');
    }
}

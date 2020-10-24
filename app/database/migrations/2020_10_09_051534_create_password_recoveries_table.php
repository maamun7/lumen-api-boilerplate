<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordRecoveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PasswordRecoveries', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->text('QuestionOne')->nullable();
            $table->text('AnswerOne')->nullable();
            $table->text('QuestionTwo')->nullable();
            $table->text('AnswerTwo')->nullable();
            $table->text('QuestionThree')->nullable();
            $table->text('AnswerThree')->nullable();
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
        Schema::dropIfExists('PasswordRecoveries');
    }
}

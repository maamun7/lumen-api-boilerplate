<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Menus', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Title');
            $table->enum('Level', ['TopMenu', 'BottomMenu', 'Others'])->default('TopMenu');
            $table->integer('ParentId')->default(0);
            $table->integer('Ordering')->default(0);
            $table->string('ContentType');
            $table->integer('ContentId')->default(0);
            $table->string('Link')->nullable();
            $table->string('MenuIcon')->nullable();
            $table->tinyInteger('IsActive')->default(0);
            $table->text('MetaKeyword')->nullable();
            $table->text('MetaDescription')->nullable();
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
        Schema::dropIfExists('Menus');
    }
}

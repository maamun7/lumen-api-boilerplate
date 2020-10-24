<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pages', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('PageTitle');
            $table->longText('Description')->nullable();
            $table->string('FeaturePhoto')->nullable();
            $table->text('MetaKeyword')->nullable();
            $table->text('MetaDescription')->nullable();
            $table->tinyInteger('Status')->default(1);
            $table->unsignedBigInteger('PageCategoryId');       
            $table->foreign('PageCategoryId')->references('Id')->on('PageCategories');           
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
        Schema::dropIfExists('Pages');
    }
}

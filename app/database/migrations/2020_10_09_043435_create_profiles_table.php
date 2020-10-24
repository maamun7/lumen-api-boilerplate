<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Profiles', function (Blueprint $table) { 
            $table->bigIncrements('Id');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('AltMobileNo')->nullable();
            $table->string('RecoveryEmail')->nullable();
            $table->string('Occupation')->nullable();
            $table->text('Bio')->nullable();
            $table->tinyInteger('Sex')->nullable()->comment('0 = Female, 1 = Male, 2 = Others');
            $table->date('DateOfBirth')->nullable();
            $table->string('ProfilePhoto')->nullable();
            $table->string('CoverPhoto')->nullable(); 
            $table->integer('CompletePercentage')->default(0);
            $table->tinyInteger('Status')->default(1);
            $table->unsignedBigInteger('UserId');       
            $table->foreign('UserId')->references('Id')->on('Users');
            $table->unsignedBigInteger('CountryId');
            $table->foreign('CountryId')->references('Id')->on('Countries');
           /*
            $table->unsignedBigInteger('AddressId');
            $table->foreign('AddressId')->references('Id')->on('Addresses'); 
            $table->unsignedBigInteger('EducationId');
            $table->foreign('EducationId')->references('Id')->on('Educations');
            $table->unsignedBigInteger('ExperienceId');
            $table->foreign('ExperienceId')->references('Id')->on('Experiences');
            $table->unsignedBigInteger('SkillId');
            $table->foreign('SkillId')->references('Id')->on('Skills');
            $table->unsignedBigInteger('SocialLinkId');
            $table->foreign('SocialLinkId')->references('Id')->on('SocialLinks'); 
            */
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
        Schema::dropIfExists('Profiles');
    }
}

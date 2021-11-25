<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sec_education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('sec_institution');
            $table->unsignedInteger('sec_qualification_level_id');
            $table->unsignedInteger('sec_start_year');
            $table->unsignedInteger('sec_start_month');
            $table->unsignedInteger('sec_end_year')->nullable();
            $table->unsignedInteger('sec_end_month')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sec_education');
    }
}

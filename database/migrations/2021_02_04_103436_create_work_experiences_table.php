<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('employer')->nullable();
            $table->string('job_title');
            $table->unsignedInteger('job_level');
            $table->unsignedInteger('country');
            $table->unsignedInteger('monthly_salary');
            $table->unsignedInteger('work_type');
            $table->unsignedInteger('start_month');
            $table->unsignedInteger('start_year');
            $table->unsignedInteger('end_month')->nullable();
            $table->unsignedInteger('end_year')->nullable();
            $table->boolean('is_current')->default(0);
            $table->text('job_responsibility')->nullable();
            $table->text('extra_experience')->nullable();



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
        Schema::dropIfExists('work_experiences');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAttributsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_attributs', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->enum('type',[
                'job_level',
                'job_experience',
                'monthly_salary',
                'work_type',
                'country',
                'education_qualification',
                'city'
            ]);
            $table->string('name');
            $table->boolean('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('job_attributs');
    }
}

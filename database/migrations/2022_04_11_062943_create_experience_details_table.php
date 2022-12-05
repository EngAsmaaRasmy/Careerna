<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_details', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->nullable();
            $table->string('company_name')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('job_type_id')->nullable();
            $table->string('start_year')->nullable();
            $table->string('start_month')->nullable();
            $table->string('end_year')->nullable();
            $table->string('end_month')->nullable();
            $table->integer('employee_id');
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
        Schema::dropIfExists('experience_details');
    }
}

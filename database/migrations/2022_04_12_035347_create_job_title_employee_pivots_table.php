<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTitleEmployeePivotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_job_title', function (Blueprint $table) {
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id', 'employee_id_fk_1001484')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedInteger('job_title_id');
            $table->foreign('job_title_id', 'job_title_id_fk_1001475')->references('id')->on('job_titles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_job_title');
    }
}

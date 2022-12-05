<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location')->nullable();
            $table->string('vacancies')->nullable();
            $table->string('experience')->nullable();
            $table->decimal('salary')->nullable();
            $table->text('description')->nullable();
            $table->text('requirements')->nullable();
            $table->integer('category_id');
            $table->integer('employer_id');
            $table->integer('career_level_id');
            $table->integer('job_type_id');
            $table->string('job_status')->default(1);
            $table->string('admin_approve')->default(1);
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
        Schema::dropIfExists('jobs');
    }
}

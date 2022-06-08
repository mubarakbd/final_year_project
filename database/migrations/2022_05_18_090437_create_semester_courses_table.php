<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_courses', function (Blueprint $table) {
            $table->id();
            $table->string('session_name');
            $table->string('session_year');   
            $table->unsignedInteger('course_id');
            $table->string('course_code');
            $table->string('course_credit');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
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
        Schema::dropIfExists('semester_courses');
    }
};

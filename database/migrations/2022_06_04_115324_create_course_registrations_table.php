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
        Schema::create('course_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dep_name')->constrained('departments');
            $table->string('program_name');
            $table->foreignId('semester_id')->constrained('semesters');
            $table->unsignedBigInteger('reg_number');
            $table->string('name');
            $table->unsignedBigInteger('course_id');
            $table->string("course_code");
            $table->string('course_credit');
            $table->integer('status')->default(0);
            $table->boolean('confirmed')->nullable()->default(0);
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('course_registrations');
    }
};

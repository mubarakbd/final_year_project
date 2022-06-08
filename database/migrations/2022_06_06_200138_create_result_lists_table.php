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
        Schema::create('result_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reg_number');
            $table->string('program_name');
            $table->unsignedBigInteger('course_id');
            $table->string("course_code");
            $table->string('course_credit');
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
        Schema::dropIfExists('result_lists');
    }
};

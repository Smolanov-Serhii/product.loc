<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lesson_id')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('schedule_lesson_id')->nullable();
            $table->timestamps();

            /** Foreign keys */
            $table
                ->foreign('lesson_id')
                ->references('id')->on('lessons');
            $table
                ->foreign('student_id')
                ->references('id')->on('students');
            $table
                ->foreign('schedule_lesson_id')
                ->references('id')->on('schedule_lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_items');
    }
}

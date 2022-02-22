<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name',256);
            $table->date('date_of_receipt');
            $table->string('phone_number',13)->unique();
            $table->string('email')->unique();
            $table->float('salary',8,2);
            $table->unsignedBigInteger('boss_id')->nullable();
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('admin_created_id')->nullable();
            $table->unsignedBigInteger('admin_updated_id')->nullable();
            $table->timestamps();


            /** Foreign keys */
            $table
                ->foreign('boss_id')
                ->references('id')->on('employees');
            $table
                ->foreign('position_id')
                ->references('id')->on('positions');
            $table
                ->foreign('admin_created_id')
                ->references('id')->on('users');
            $table
                ->foreign('admin_updated_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

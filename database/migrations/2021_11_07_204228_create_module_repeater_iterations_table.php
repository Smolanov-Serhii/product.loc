<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleRepeaterIterationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_repeater_iterations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module_repeater_id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('admin_created_id')->nullable();
            $table->unsignedBigInteger('admin_updated_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /** Foreign keys */
            $table
                ->foreign('module_repeater_id', 'mr_id_foreign')
                ->references('id')->on('module_repeaters');
            $table
                ->foreign('module_id')
                ->references('id')->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_repeater_iterations');
    }
}

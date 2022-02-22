<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockTemplateRepeaterIterationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_template_repeater_iterations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('block_template_repeater_id');
            $table->unsignedBigInteger('block_id');
            $table->unsignedBigInteger('admin_created_id')->nullable();
            $table->unsignedBigInteger('admin_updated_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /** Foreign keys */
            $table
                ->foreign('block_template_repeater_id', 'btr_id_foreign')
                ->references('id')->on('block_template_repeaters');
            $table
                ->foreign('block_id')
                ->references('id')->on('blocks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('block_template_repeater_iterations');
    }
}

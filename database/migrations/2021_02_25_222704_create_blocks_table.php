<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->boolean('enabled');
            $table->integer('order')->nullable();
            $table->string('model');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('block_template_id')->nullable();
            $table->unsignedBigInteger('admin_created_id')->nullable();
            $table->unsignedBigInteger('admin_updated_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

//            $table
//                ->foreign('lang_id')
//                ->references('id')->on('languages');
            $table
                ->foreign('page_id')
                ->references('id')->on('pages');

            $table
                ->foreign('block_template_id')
                ->references('id')->on('block_templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blocks');
    }
}

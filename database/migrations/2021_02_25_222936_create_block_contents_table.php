<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('block_id');
            $table->unsignedBigInteger('block_template_attribute_id');
            $table->unsignedBigInteger('block_template_repeater_iteration_id')->nullable();

            $table->boolean('enabled');
            $table->unsignedBigInteger('admin_created_id')->nullable();
            $table->unsignedBigInteger('admin_updated_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /** Foreign keys */
            $table
                ->foreign('block_id')
                ->references('id')->on('blocks');
            $table
                ->foreign('block_template_attribute_id')
                ->references('id')->on('block_template_attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('block_contents');
    }
}

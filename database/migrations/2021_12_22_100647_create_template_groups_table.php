<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('block_template_id')->nullable();
            $table->unsignedBigInteger('block_template_group_id')->nullable();
            $table->timestamps();

            /** Foreign keys */
            $table
                ->foreign('block_template_id')
                ->references('id')->on('block_templates');
            $table
                ->foreign('block_template_group_id')
                ->references('id')->on('block_template_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template_groups');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockTemplateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_template_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('key', 255);
            $table->longText('default_value');
            $table->smallInteger('type');
            $table->string('model', 255);
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('admin_created_id')->nullable();
            $table->unsignedBigInteger('admin_updated_id')->nullable();
            $table->timestamps();
            $table->softDeletes();


//            $table
//                ->foreign('block_template_id')
//                ->references('id')->on('block_templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('block_template_attributes');
    }
}

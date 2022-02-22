<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_attributes', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('type');
            $table->string('name');
            $table->unsignedBigInteger('module_id')->nullable();
            $table->unsignedBigInteger('admin_created_id')->nullable();
            $table->unsignedBigInteger('admin_updated_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /** Foreign keys */
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
        Schema::dropIfExists('module_attributes');
    }
}

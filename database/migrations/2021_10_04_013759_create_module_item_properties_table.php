<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleItemPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_item_properties', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->unsignedBigInteger('module_item_id')->nullable();
            $table->unsignedBigInteger('module_attribute_id')->nullable();
            $table->unsignedBigInteger('admin_created_id')->nullable();
            $table->unsignedBigInteger('admin_updated_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /** Foreign keys */
            $table
                ->foreign('module_item_id')
                ->references('id')->on('module_items');
            $table
                ->foreign('module_attribute_id')
                ->references('id')->on('module_attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_item_properties');
    }
}

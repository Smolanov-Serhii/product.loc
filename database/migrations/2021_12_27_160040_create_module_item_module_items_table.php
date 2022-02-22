<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleItemModuleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_item_module_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_module_item_id')->nullable();
            $table->unsignedBigInteger('child_module_item_id')->nullable();
            $table->timestamps();

            /** Foreign keys */
            $table
                ->foreign('parent_module_item_id')
                ->references('id')->on('module_items');
            $table
                ->foreign('child_module_item_id')
                ->references('id')->on('module_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_item_module_items');
    }
}

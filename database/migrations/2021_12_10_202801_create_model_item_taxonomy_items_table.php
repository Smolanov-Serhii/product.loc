<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelItemTaxonomyItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_item_taxonomy_items', function (Blueprint $table) {
            $table->unsignedBigInteger('taxonomy_item_id')->nullable();
            $table->unsignedBigInteger('module_item_id')->nullable();
            $table->timestamps();

            /** Foreign keys */
            $table
                ->foreign('taxonomy_item_id')
                ->references('id')->on('taxonomy_items');
            $table
                ->foreign('module_item_id')
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
        Schema::dropIfExists('model_item_taxonomy_items');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxonomyItemPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxonomy_item_properties', function (Blueprint $table) {
            $table->id();
            $table->text('value'); // multi_lang
            $table->unsignedBigInteger('taxonomy_item_id')->nullable();
            $table->unsignedBigInteger('taxonomy_attribute_id')->nullable();
            $table->unsignedBigInteger('admin_created_id')->nullable();
            $table->unsignedBigInteger('admin_updated_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /** Foreign keys */
            $table
                ->foreign('taxonomy_item_id')
                ->references('id')->on('taxonomy_items');
            $table
                ->foreign('taxonomy_attribute_id')
                ->references('id')->on('taxonomy_attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxonomy_item_properties');
    }
}

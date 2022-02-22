<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleTaxonomiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_taxonomies', function (Blueprint $table) {
            $table->unsignedBigInteger('taxonomy_id')->nullable();
            $table->unsignedBigInteger('module_id')->nullable();
            $table->timestamps();

            /** Foreign keys */
            $table
                ->foreign('taxonomy_id')
                ->references('id')->on('taxonomies');
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
        Schema::dropIfExists('module_taxonomies');
    }
}

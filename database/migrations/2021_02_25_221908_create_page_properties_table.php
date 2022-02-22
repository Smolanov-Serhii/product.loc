<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lang_id')->nullable();
            $table->unsignedBigInteger('page_id')->nullable();
            $table->boolean('enabled')->default(false);
            $table->string('title', 255);
            $table->string('keywords', 255);
            $table->string('description', 255);
            $table->string('h1', 255);
            $table->string('h2', 255);
            $table->string('alias', 255);
            $table->unsignedBigInteger('admin_created_id')->nullable();
            $table->unsignedBigInteger('admin_updated_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /** Foreign keys */
            $table
                ->foreign('lang_id')
                ->references('id')->on('languages');
            $table
                ->foreign('page_id')
                ->references('id')->on('pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_properties');
    }
}

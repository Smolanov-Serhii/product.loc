<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelAdditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_additions', function (Blueprint $table) {
            $table->id();
            $table->string('model', 255)->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->unsignedBigInteger('lang_id')->nullable();
            $table->string('title');
            $table->string('content');
            $table->string('excerpt');
            $table->string('thumbnail',255);
            $table->unsignedBigInteger('admin_created_id')->nullable();
            $table->unsignedBigInteger('admin_updated_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /** Foreign keys */
            $table
                ->foreign('lang_id')
                ->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_additions');
    }
}

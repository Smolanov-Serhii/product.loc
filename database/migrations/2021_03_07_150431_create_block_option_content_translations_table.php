<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockOptionContentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_option_content_translations', function (Blueprint $table) {
            $table->id();
            $table->longText('value');
            $table->smallInteger('type');
            $table->unsignedBigInteger('block_content_translation_id');
            $table->unsignedBigInteger('admin_created_id')->nullable();
            $table->unsignedBigInteger('admin_updated_id')->nullable();
            $table->timestamps();
            $table->softDeletes();


            $table
                ->foreign('block_content_translation_id', 'bct_id_foreign')
                ->references('id')->on('block_content_translations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('block_option_content_translations');
    }
}

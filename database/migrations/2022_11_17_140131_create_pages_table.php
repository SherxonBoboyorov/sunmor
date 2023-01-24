<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            $table->string('image');

            $table->string('title_en');
            $table->string('title_es');

            $table->string('slug_en');
            $table->string('slug_es');

            $table->text('description_en');
            $table->text('description_es');

            $table->text('frame');

            $table->text('meta_title_en')->nullable();
            $table->text('meta_title_es')->nullable();

            $table->text('meta_description_en')->nullable();
            $table->text('meta_description_es')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};

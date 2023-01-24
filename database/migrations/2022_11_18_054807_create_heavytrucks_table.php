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
        Schema::create('heavytrucks', function (Blueprint $table) {
            $table->id();

            $table->string('image');

            $table->string('truck_name_en');
            $table->string('truck_name_es');

            $table->string('slug_en');
            $table->string('slug_es');

            $table->text('truck_description_en');
            $table->text('truck_description_es');

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
        Schema::dropIfExists('heavytrucks');
    }
};

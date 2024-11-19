<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string('title_en'); 
            $table->string('title_ar'); 
            $table->string('title_fr'); 
            $table->string('title_ja'); 
            $table->text('description_en');
            $table->text('description_ar');
            $table->text('description_fr');
            $table->text('description_ja');
            
            $table->string('slug');
            $table->text('photo_path')->nullable();


            $table->softDeletes();
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
        Schema::dropIfExists('services');
    }
}

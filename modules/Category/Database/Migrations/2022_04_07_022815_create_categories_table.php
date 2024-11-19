<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_en'); 
            $table->string('name_ar'); 
            $table->string('name_fr'); 
            $table->string('name_ja'); 
            $table->text('description_en');
            $table->text('description_ar');
            $table->text('description_fr');
            $table->text('description_ja');


            $table->text('photo_path');
            $table->string('slug');
            $table->integer('parent_id')->nullable();
            
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
        Schema::dropIfExists('categories');
    }
}

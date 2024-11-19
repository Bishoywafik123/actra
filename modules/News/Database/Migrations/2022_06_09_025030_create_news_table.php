<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->string('title_en'); 
            $table->string('title_ar'); 
            $table->string('title_fr'); 
            $table->string('title_ja'); 
            $table->text('content_en');
            $table->text('content_ar');
            $table->text('content_fr');
            $table->text('content_ja');
            $table->string('photo');
            $table->string('slug')->nullable();
            
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
        Schema::dropIfExists('news');
    }
}

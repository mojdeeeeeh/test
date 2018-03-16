<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('title');
            
            $table->json('extra')
                    ->nullable();

            $table->integer('gallery_id')
                    ->unsigned()
                    ->index();

            $table->foreign('gallery_id')
                    ->references ('id')
                    ->on ('galleries')
                    ->onUpdate ('cascade')
                    ->onDelete ('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}

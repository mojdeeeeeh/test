<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            
            $table->text('cmBody');
            $table->string('cmName');
            $table->string('cmEmail');
            
            $table->integer('post_id')->unsigned();
            $table->timestamps();

            $table->foreign('post_id')
                ->references ('id')->on ('posts')
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
        Schema::dropIfExists('comments');
    }
}

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->text('description')->nullable();            
            $table->string('location')->nullable();
            $table->string('filename')->nullable();
            $table->string('filepath')->nullable();
            $table->binary('picture')->nullable();
            $table->dateTime('tag_at')->nullable();
            $table->longText('tagged')->nullable();
            $table->longText('positions')->nullable();
            $table->timestamps();

            /*
            $table->foreign('user_id', 'UserPhotoRelation')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unique(['id', 'user_id'], 'PhotoUnique');
            */
        });

        Schema::table('photos', function(Blueprint $table) {
            $table->unique(['id', 'user_id'], 'PhotosUnique');
            $table->foreign('user_id', 'PhotoUserRelation')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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

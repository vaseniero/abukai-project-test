<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoTaggingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_taggings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->text('description')->nullable();            
            $table->string('location')->nullable();
            $table->dateTime('tag_at')->nullable();
            $table->longText('tagged')->nullable();
            $table->longText('positions')->nullable();
            $table->timestamps();

            $table->foreign('user_id', 'UserPhotoRelation')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->unique(['id', 'user_id'], 'PhotoTaggingsUnique');
        });

/* 
        Schema::table('photo_taggings', function(Blueprint $table) {
            $table->unique(['id', 'user_id'], 'PhotoTaggingsUnique');
        });
 */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_taggings');
    }
}

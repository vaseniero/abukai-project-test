<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('photo_id');
            $table->unsignedBigInteger('user_id');
            $table->point('position')->nullable();
            $table->timestamps();

            /*
            $table->foreign('photo_id', 'TagPhotoRelation')
                ->references('id')
                ->on('photos')
                ->onDelete('cascade');
            
            $table->unique(['photo_id', 'tag_user_id'], 'TagsUnique');
            */
        });

        Schema::table('tags', function(Blueprint $table) {
            $table->unique(['photo_id', 'user_id'], 'TagsUnique');
            $table->foreign('photo_id', 'TagPhotoRelation')
                ->references('id')
                ->on('photos')
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
        Schema::dropIfExists('tags');
    }
}

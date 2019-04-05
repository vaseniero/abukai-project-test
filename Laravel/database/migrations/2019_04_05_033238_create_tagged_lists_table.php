<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaggedListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagged_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('photo_id');
            $table->unsignedBigInteger('tag_user_id');
            $table->point('position')->nullable();
            $table->timestamps();

            $table->foreign('photo_id', 'PhotoTagRelation')
                ->references('id')
                ->on('photo_taggings')
                ->onDelete('cascade');
        });

        Schema::table('tagged_lists', function(Blueprint $table) {
            $table->unique(['photo_id', 'tag_user_id'], 'TaggedListsUnique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagged_lists');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('arTitle');
            $table->string('enTitle');
            $table->unsignedBigInteger('subOf');
            $table->string('poster');
            $table->text('arSummery');
            $table->text('enSummery');
            $table->longText('arContent');
            $table->longText('enContent');
            $table->boolean('isPublished');

            $table->foreign('subOf')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

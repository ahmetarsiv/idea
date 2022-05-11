<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('short_description');
            $table->longText('description');
            $table->foreignId('default_category');
            $table->foreignId('author');
            $table->string('tags');
            $table->string('image');
            $table->string('locale')->nullable();
            $table->boolean('status');
            $table->string('meta_title');
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->dateTime('published_at')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};

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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('copyright');
            $table->boolean('copyright_allow');
            $table->boolean('blog_allow');
            $table->boolean('product_allow');
            $table->boolean('category_allow');
            $table->boolean('cms_allow');
            $table->longText('custom_css')->nullable();
            $table->longText('custom_js')->nullable();
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
        Schema::dropIfExists('configurations');
    }
};

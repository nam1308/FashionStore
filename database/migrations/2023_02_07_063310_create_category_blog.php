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
        Schema::create('category_blog', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('slug',255)->unique();
            $table->string('description',255)->nullable();
            $table->integer('parent')->default(0);
            $table->text('thumbnail_url')->nullable();
            $table->text('banner_url');
            $table->string('lang',5)->default('vi');
            $table->integer('sort_order')->nullable();
            $table->tinyInteger('show_home')->default(0);
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
        Schema::dropIfExists('category_blog');
    }
};

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
            $table->text('description')->nullable();
            $table->integer('parent')->default(0)->comment('0 is original directory');
            $table->text('thumbnail_url')->nullable();
            $table->text('banner_url')->nullable();
            $table->string('lang',5)->default('vi');
            $table->integer('sort_order')->nullable();
            $table->boolean('show_home')->default(0)->comment('0=hidden and true=visible');
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

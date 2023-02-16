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
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('slug',255)->unique();
            $table->string('excerpt',255);
            $table->text('image')->nullable();
            $table->text('content')->nullable();
            $table->integer('sort_order')->nullable();
            $table->boolean('status')->default(true)->comment('0=hidden and true=visible');
            $table->string('parent',255)->comment('multiple ')->nullable();
            $table->boolean('is_popular')->default(true)->comment('0=hidden and true=visible');
            $table->string('author',255)->nullable();
            $table->string('lang',5)->default('vi');
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
        Schema::dropIfExists('blog');
    }
};

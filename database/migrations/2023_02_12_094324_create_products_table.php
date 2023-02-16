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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('slug',255)->unique();
            $table->string('description',255)->nullable();
            $table->text('content')->nullable();
            $table->integer('parent')->nullable();
            $table->integer('sort_order')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=hidden and 1=visible');
            $table->double('regular_price');
            $table->text('thumbs')->nullable();
            $table->text('image')->nullable();
            $table->tinyInteger('is_hot')->default(0)->comment('0 = no hot and 1 = hot');
            $table->string('meta_description',255)->nullable();
            $table->string('meta_title',255)->nullable();
            $table->string('meta_keyword',255)->nullable();
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
        Schema::dropIfExists('products');
    }
};

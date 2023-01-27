<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique();
            $table->string('description')->nullable();
        });
        Schema::create('auth_item', function (Blueprint $table) {
            $table->id();
            $table->string('role', 255)->unique();
            $table->string('route', 255)->unique();
            $table->tinyInteger('type')->comment()->default(1);
        });
        Schema::create('user_role', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id', 255)->unique();
            $table->string('role_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

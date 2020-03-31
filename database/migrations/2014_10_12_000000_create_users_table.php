<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 60);
            $table->string('username', 30)->unique();
            $table->string('email', 80)->unique();
            $table->string('phone', 20)->unique()->nullable();
            $table->string('password', 80);
            $table->string('image', 100)->default('default.png');
            $table->text('address')->nullable();
            $table->text('about')->nullable();
            $table->tinyInteger('role')->default(4);
            $table->tinyInteger('status')->default(1);            
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
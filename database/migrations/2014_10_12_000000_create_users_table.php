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
            $table->id();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('username')->nullable();
            $table->json('friend')->nullable();
            $table->json('groups')->nullable();
            $table->string('country')->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_blocked')->default(0);
            $table->text('preference')->default('No Bio Add It');
            $table->enum('role', ['user','admin'])->default('user');
            $table->string('avatar')->default(config('chatify.user_avatar.default'));
            $table->string('background')->default('https://www.pinclipart.com/picdir/middle/377-3777014_add-team-members-with-multi-user-accounts-multi.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_seen')->nullable();
            $table->boolean('active_status')->default(0);
            $table->boolean('dark_mode')->default(0);
            $table->string('messenger_color')->default('#2180f3');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

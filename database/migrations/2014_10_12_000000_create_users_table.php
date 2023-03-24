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
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('provider_id')->nullable();
            $table->string('fb_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('git_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('vendor_join')->nullable();
            $table->string('vendor_short_info')->nullable();
            $table->string('last_seen')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->enum('role', ['admin','vendor', 'user'])->default('user');
            $table->enum('status', ['active','inactive'])->default('active');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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

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
            $table->string('slag', 100)->unique()->comment('user\'s unique name');
            $table->string('email')->unique();
            $table->string('first_name', 100);
            $table->string('middle_names', 100)->nullable();
            $table->string('last_name', 100);
            $table->string('profile_pic', 100)->default('avatar.jpg');
            $table->text('bio')->nullable()->comment('few words about the user');
            $table->integer('school_id');
            $table->string('tel', 20)->comment('user\'s telephone number including country code. Eg. 233240000000');
            $table->string('verification_code', 100);
            $table->timestamp('email_verified_at')->nullable()->comment('shows whether user\'s email has been verified by the time it was verified');
            $table->timestamp('tel_verified_at')->nullable()->comment('shows whether user\'s tel has been verified by showing the time of verification');
            $table->rememberToken();
            $table->string('status', 20)->default('pending')->comment('User status has the following states:
            PENDING - the default state after creating before user verifies email address.
            ACTIVE - after user verifies email address.
            INACTIVE -  when user account is flagged for violations, etc.');
            $table->string('password', 100);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            $table->timestamp('deleted_at')->nullable();
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

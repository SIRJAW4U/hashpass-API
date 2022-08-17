<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->unique();
            $table->string('slag')->unique()->nullable()->comment('unique AKA for the school.  Eg. KNUST, UCC');
            $table->string('logo', 100)->nullable();
            $table->text('campus_pics')->default('[]')->comment('a list of names of pictures of the school');
            $table->string('website', 100)->nullable()->comment('the url to the school\'s website');
            $table->string('map_address', 100)->nullable()->comment('the google map location for the school');
            $table->text('description')->nullable()->comment('other/additional information about the school');
            $table->string('status', 20)->default('pending')->comment('School status has the following states:
                PENDING - the default state after creating before the paper is approved by system admin.
                ACTIVE - when admin approves the school.
                INACTIVE -  when school gets flagged or taken off the public space and is inaccessible to public users');
            $table->timestamp('created_at')->useCurrent();
            $table->integer('created_by');
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
        Schema::dropIfExists('schools');
    }
}

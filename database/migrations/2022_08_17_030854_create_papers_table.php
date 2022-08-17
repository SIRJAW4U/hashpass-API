<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('id of the user who uploaded the paper');
            $table->integer('school_id');
            $table->string('course_title', 250);
            $table->string('course_code', 100);
            $table->year('year');
            $table->string('type', 20)->comment('Paper type could be EXAM or QUIZ');
            $table->string('format', 100)->comment('Paper format explores the idea of considering various forms/types of uploads including:
                DOCUMENT: Eg. .pdf, .docx, etc.
                IMAGE: Eg. .png, .jpeg, etc.');
            $table->text('description')->nullable()->comment('other/additional information about the paper');
            $table->string('file_path', 100)->comment('the full stored name to the document.');
            $table->string('status', 20)->default('pending')->comment('Paper status has the following states:
            PENDING - the default state after upload before the paper is approved by admin.
            ACTIVE - when admin approves the upload. At this time, the paper is available to all users.
            INACTIVE -  when paper gets flagged or taken off the public space and is inaccessible to public users.');
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
        Schema::dropIfExists('papers');
    }
}

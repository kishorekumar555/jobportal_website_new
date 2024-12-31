<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('user_type');
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('qualifications')->nullable();
            $table->text('education')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_tagline')->nullable();
            $table->string('company_website')->nullable();
            $table->string('phone')->nullable();
            $table->string('profile_photo')->nullable();
            $table->timestamps();
        });

        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->string('job_title');
            $table->string('company_name');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('work_experiences');
        Schema::dropIfExists('profiles');
    }
}


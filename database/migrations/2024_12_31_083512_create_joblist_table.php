<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('joblist', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique;
            $table->string('job_title');
            $table->string('location');
            $table->string('job_region');
            $table->enum('job_type', ['Part Time', 'Full Time']);
            $table->text('job_description');
            $table->string('company_name');
            $table->string('company_tagline')->nullable();
            $table->text('company_description');
            $table->string('company_website')->nullable();
            $table->string('company_facebook')->nullable();
            $table->string('company_twitter')->nullable();
            $table->string('company_linkedin')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('company_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joblist');
    }
};


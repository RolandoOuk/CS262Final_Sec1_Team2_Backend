<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserResumeTable extends Migration
{
    public function up()
    {
        Schema::create('user_resume', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('template_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade'); // Corrected to match 'user_id'
            $table->foreign('template_id')->references('id')->on('templates')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_resume');
    }
}

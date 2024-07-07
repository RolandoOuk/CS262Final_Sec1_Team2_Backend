<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserResumeIdToUserResumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_resume', function (Blueprint $table) {
            $table->bigIncrements('user_resume_id');  // Add the new column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_resume', function (Blueprint $table) {
            $table->dropColumn('user_resume_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSampleExam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('sample_exam', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exam_id');
            $table->unsignedInteger('user_id');
            $table->integer('mark')->nullable();
            $table->string('time', 255);
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sample_exam');
    }
}

// Schema::table('post', function (Blueprint $table) {
//     $table->unsignedInteger('subject_id');
//     $table->foreign('subject_id')->references('id')->on('subject')->onDelete('cascade');
// });

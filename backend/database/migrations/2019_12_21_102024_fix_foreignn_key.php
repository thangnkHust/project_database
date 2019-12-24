<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixForeignnKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post', function (Blueprint $table) {
            // $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')
                ->references('id')->on('subject')
                ->onDelete('cascade');
        });

        Schema::table('exam', function (Blueprint $table) {
            // $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')
                ->references('id')->on('subject')
                ->onDelete('cascade');
        });

        Schema::table('question', function (Blueprint $table) {
            // $table->unsignedInteger('exam_id');
            $table->foreign('exam_id')
                ->references('id')->on('exam')
                ->onDelete('cascade');
        });

        Schema::table('sample_exam', function (Blueprint $table) {
            // $table->unsignedInteger('exam_id');
            // $table->unsignedInteger('user_id');
            $table->foreign('exam_id')
                ->references('id')->on('exam')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('user')
                ->onDelete('cascade');
        });

        Schema::table('user', function (Blueprint $table) {
            // $table->unsignedInteger('exam_id');
            $table->foreign('role_id')
                ->references('id')->on('role')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post', function (Blueprint $table) {
            $table->dropForeign('post_subject_id_foreign');
        });

        Schema::table('exam', function (Blueprint $table) {
            $table->dropForeign('exam_subject_id_foreign');
        });

        Schema::table('question', function (Blueprint $table) {
            $table->dropForeign('question_exam_id_foreign');
        });

        Schema::table('sample_exam', function (Blueprint $table) {
            $table->dropForeign('sample_exam_exam_id_foreign');
            $table->dropForeign('sample_exam_user_id_foreign');
        });
    }
}

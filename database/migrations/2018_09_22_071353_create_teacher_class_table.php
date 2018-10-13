<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_class', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('classes_id');
            $table->timestamps();

            $table->index('user_id', 'teacher_class_user_id_index');
            $table->index('classes_id', 'teacher_class_classes_id_index');

            $table->foreign('user_id', 'teacher_class_user_id_foreign')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('classes_id', 'teacher_class_classes_id_foreign')->references('id')->on('classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher_class', function(Blueprint $table){
            $table->dropForeign('teacher_class_user_id_foreign');
            $table->dropForeign('teacher_class_classes_id_foreign');

            $table->dropIndex('teacher_class_user_id_index');
            $table->dropIndex('teacher_class_classes_id_index');

        });

        Schema::dropIfExists('teacher_class');
    }
}

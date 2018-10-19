<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('teacher_class_id');
            $table->time('time_in');
            $table->time('time_out');

            $table->index('teacher_class_id', 'attendance_teacher_class_id_index');
            $table->foreign('teacher_class_id', 'attendance_teacher_class_id_foreign')->references('id')->on('teacher_class');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendances', function(Blueprint $table){
            $table->dropForeign('attendance_teacher_class_id_foreign');
            $table->dropIndex('attendance_teacher_class_id_index');

        });

        Schema::dropIfExists('attendance');
    }
}

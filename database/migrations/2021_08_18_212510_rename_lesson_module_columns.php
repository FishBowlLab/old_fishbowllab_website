<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameLessonModuleColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->renameColumn('completed_module_number', 'completed_lesson_number');
        });
        Schema::table('teachers', function (Blueprint $table) {
            $table->renameColumn('module_available', 'lesson_available');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->renameColumn('completed_lesson_number', 'completed_module_number');
        });
        Schema::table('teachers', function (Blueprint $table) {
            $table->renameColumn('lesson_available', 'module_available');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameLesssonModuleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename("modules", "lessons_temp");
        Schema::rename("lessons", "modules");
        Schema::rename("lessons_temp", "lessons");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::rename("lessons", "modules_temp");
        Schema::rename("modules", "lessons");
        Schema::rename("modules_temp", "modules");
    }
}

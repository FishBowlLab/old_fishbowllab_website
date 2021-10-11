<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RestructureModuleCompletion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    
    {
        Schema::table('modules', function (Blueprint $table) {
            $table->dropColumn(["module_number", "completed"]);
            $table->integer("completed_module_number");
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modules', function (Blueprint $table) {
            $table->integer("module_number");
            $table->boolean("completed");
            $table->dropColumn("completed_module_number");
        });
    }
}

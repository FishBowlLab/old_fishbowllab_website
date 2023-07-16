<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveNamesFromMailingList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_collector', function (Blueprint $table) {
            $table->dropColumn("firstname");
            $table->dropColumn("lastname");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('email_collector', function (Blueprint $table) {
            $table->integer("firstname");
            $table->string("lastname");
        });
    }
}

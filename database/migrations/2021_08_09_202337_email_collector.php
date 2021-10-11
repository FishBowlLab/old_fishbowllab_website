<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmailCollector extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_collector', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("firstname");
            $table->string("lastname");
            $table->string("email")->unique();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_collector');
    }
    
}

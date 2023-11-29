<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ability', function (Blueprint $table) {
            $table->string('id', 50);
            $table->string('ability');
            $table->integer('percentage');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('clients')->nullable();
            $table->integer('projects')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ability');
    }
}

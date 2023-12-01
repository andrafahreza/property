<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_package', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('id_package', 50);
            $table->string('sub');
            $table->timestamps();

            $table->foreign("id_package")->references("id")->on("package")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_package');
    }
}

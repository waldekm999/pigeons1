<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePigeonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pigeons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ring')->unique();
            $table->string('name');
            $table->enum('gender', ['male', 'female', 'unknown']);
            $table->integer('birth_year');
            $table->string('race');
            $table->string('colour');
            $table->enum('status', ['present','retired','sick', 'dead','onSale', 'sold', 'lost']);
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
        Schema::dropIfExists('pigeons');
    }
}

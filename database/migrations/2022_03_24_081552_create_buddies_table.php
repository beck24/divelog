<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuddiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buddies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('buddy_dive', function (Blueprint $table) {
            $table->foreignId('buddy_id')->constrained()->onDelete('cascade');
            $table->foreignId('dive_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buddies');
        Schema::dropIfExists('buddy_dive');
    }
}

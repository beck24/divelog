<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitenames', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('sitelocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('dives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('divenum')->default(0);
            $table->timestamp('date')->nullable();
            $table->foreignId('sitename_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('sitelocation_id')->nullable()->constrained()->nullOnDelete();
            $table->string('divetype');
            $table->float('depth_ft');
            $table->integer('time_min');
            $table->float('visibility_ft');
            $table->float('temperature_c');
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
        Schema::dropIfExists('sitenames');
        Schema::dropIfExists('sitelocations');
        Schema::dropIfExists('dives');
    }
}

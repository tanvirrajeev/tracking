<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('trackings')) {
            Schema::create('trackings', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('status_id');
                $table->string('awb');
                $table->unsignedBigInteger('checkpoint_id');
                $table->unsignedBigInteger('user_id');
                $table->dateTime('status_date');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trackings');
    }
}

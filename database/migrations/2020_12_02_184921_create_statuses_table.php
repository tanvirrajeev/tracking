<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('statuses')) {
            Schema::create('statuses', function (Blueprint $table) {
                $table->id();
                $table->string('awb');
                $table->unsignedBigInteger('checkpoint_id');
                $table->unsignedBigInteger('user_id');
                $table->string('mawb')->nullable();
                $table->string('manifest');
                $table->unsignedBigInteger('areacode')->nullable();
                $table->unsignedBigInteger('third_party_id')->nullable();
                $table->string('third_party_awb')->nullable();
                $table->string('received_by')->nullable();
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
        Schema::dropIfExists('statuses');
    }
}

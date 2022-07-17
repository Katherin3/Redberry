<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_status', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('status_id');
            $table->text('comment');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['candidate_id', 'status_id']);

            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_status');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsListProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads_list_prospects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('list_id')->unsigned();
            $table->bigInteger('prospect_id')->unsigned();
            $table->timestamps();
            $table->foreign('list_id')
              ->references('id')
              ->on('leads_lists')->onDelete('cascade');
            $table->foreign('prospect_id')
              ->references('id')
              ->on('prospects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads_list_prospects');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fqdn');
            $table->unsignedBigInteger('plan_id');
            $table->date('exp_date');
            $table->integer('used_credit')->default(0);
            $table->timestamps();
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_plans');
    }
}

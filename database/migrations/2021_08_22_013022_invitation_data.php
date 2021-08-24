<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvitationData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitation_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bride')->nullable();   
            $table->string('groom')->nullable();   
            $table->date('marriage_date')->nullable();
            $table->string('bride_img', 2048)->nullable();
            $table->string('groom_img', 2048)->nullable();
            $table->text('message_guest');
            $table->string('template_url', 2048)->nullable();
            $table->string('sender_email', 2048)->unique();
            $table->string('sender_name', 2048)->nullable();
            $table->string('password', 2048)->nullable();
            $table->integer('payStatus')->default(0);
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
        Schema::dropIfExists('invitation_history');
    }
}

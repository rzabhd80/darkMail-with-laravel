<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("sender_id");
            $table->unsignedBigInteger("rec_id");
            $table->string("title");
            $table->string("text");
            $table->boolean("draft")->default(false);
            $table->boolean("deleted")->default(false);
            $table->boolean("starred")->default(false);
            $table->foreign("sender_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("rec_id")->references("id")->on("users")->onDelete("cascade");
            $table->timestamps();
            $table->unique(["sender_id","rec_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}

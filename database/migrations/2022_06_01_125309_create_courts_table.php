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
        Schema::create('courts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum("category_lvl_court", ["1","2","3","4","5"]);
            $table->enum("category", ["normal", "tournament"])->default("normal");
            $table->date('date_booking');
            $table->string('hour_booking');
            $table->string('city');
            $table->boolean('available')->default(true); 
            $table->string('img');
            $table->integer('size')->default(4);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('courts');
    }
};

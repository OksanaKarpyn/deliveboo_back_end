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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('restaurant_id')->constrained()->onDelete('cascade');
            $table->string("name");
            $table->text("description");
            $table->text("ingredients");
            $table->tinyInteger("visible");
            $table->decimal("price",10,2);
            $table->text("photo")->nullable();
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
        Schema::dropIfExists('dishes');
    }
};
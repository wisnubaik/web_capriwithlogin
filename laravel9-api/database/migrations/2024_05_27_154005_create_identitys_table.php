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
        Schema::create('identitys', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->required();
            $table->string('email', 30)->required();
            $table->string('password', 20)->required();
            $table->string('retype_password', 20);
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
        Schema::dropIfExists('identitys');
    }
};

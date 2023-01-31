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
        Schema::create('order_source', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 191)->default('Админ');
            $table->string('phone', 191);
            $table->string('email', 191);
            $table->string('source', 191)->default('Нет данных');;
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
        Schema::dropIfExists('order_source');
    }
};

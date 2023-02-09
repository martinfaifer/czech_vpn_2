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
        Schema::create('delete_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->index();
            $table->string('name');
            $table->string('email')->index();
            $table->string('variable_symbol')->unique()->index();
            $table->longText('vpn_data');
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
        Schema::dropIfExists('delete_users');
    }
};

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
        Schema::create('radacct', function (Blueprint $table) {
            $table->id('radacctid');
            $table->string('acctsessionid')->index();
            $table->string('acctuniqueid')->index();
            $table->string('username')->index();
            $table->string('realm')->nullable();
            $table->string('nasipaddress')->index();
            $table->string('nasportid')->nullable();
            $table->string('nasporttype')->nullable();
            $table->dateTime('acctstarttime')->nullable();
            $table->dateTime('acctupdatetime')->nullable();
            $table->dateTime('acctstoptime')->nullable();
            $table->integer('acctinterval')->nullable();
            $table->integer('acctsessiontime')->nullable();
            $table->string('acctauthentic')->nullable();
            $table->string('connectinfo_start')->nullable();
            $table->string('connectinfo_stop')->nullable();
            $table->bigInteger('acctinputoctets')->nullable();
            $table->bigInteger('acctoutputoctets')->nullable();
            $table->string('calledstationid');
            $table->string('callingstationid');
            $table->string('acctterminatecause');
            $table->string('servicetype')->nullable();
            $table->string('framedprotocol')->nullable();
            $table->string('framedipaddress')->index();
            $table->string('framedipv6address')->index();
            $table->string('framedipv6prefix')->index();
            $table->string('framedinterfaceid')->index();
            $table->string('delegatedipv6prefix')->index();
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
        Schema::dropIfExists('radacct');
    }
};

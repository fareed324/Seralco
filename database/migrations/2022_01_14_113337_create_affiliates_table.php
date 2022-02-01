<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->string('affiliate_firstname',100);
            $table->string('affiliate_lastname',100);
            $table->string('affilate_profileimage',255);
            $table->string('affiliate_company',);
            $table->text('affiliate_address',);
            $table->string('affiliate_city',);
            $table->string('affiliate_country',);
            $table->string('affiliate_url',);
            $table->string('affiliate_category',);
            $table->enum('affiliate_status', ['approved', 'waiting','suspend'])->default('approved');
            $table->date('affiliate_date');
            $table->bigInteger('affiliate_parentid')->default(0);
            $table->string('affiliate_fax',);
            $table->string('affiliate_phone',);
            $table->string('affiliate_state',);
            $table->string('affiliate_timezone',);
            $table->string('affiliate_zipcode',);
            $table->string('affiliate_taxId',);
            $table->string('affiliate_currency',100)->default('Dollar');
            $table->bigInteger('affiliate_group')->default('0');
            $table->string('affiliate_secretkey',);


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
        Schema::dropIfExists('affiliates');
    }
}

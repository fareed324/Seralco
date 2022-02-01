<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('merchant_firstname', 100);
            $table->string('merchant_lastname', 100);
            $table->string('merchant_profileimage', 255);
            $table->string('merchant_company', 100);
            $table->text('merchant_address');
            $table->string('merchant_city', 100);
            $table->string('merchant_country', 100);
            $table->string('merchant_phone', 100);
            $table->string('merchant_url', 100);
            $table->string('merchant_catagory', 40);
            $table->enum('merchant_status', ['approved', 'waiting','suspend','empty','NP'])->default('approved');
            $table->date('merchant_date');
            $table->string('merchant_fax', 100);
            $table->string('merchant_type', 100)->default('normal');
            $table->string('merchant_randNo', 100);
            $table->enum('merchant_pgmapproval', ['manual', 'automatic'])->default('manual');
            $table->text('merchant_currency');
            $table->string('merchant_state', 100);
            $table->string('merchant_zip', 100);
            $table->string('merchant_taxId', 100);
            $table->string('merchant_orderId', 100);
            $table->string('merchant_saleAmt', 100);
            $table->enum('merchant_isInvoice', ['Yes', 'No'])->default('No');
            $table->enum('merchant_invoiceStatus', ['active', 'inactive'])->default('inactive');
            $table->longText('merchant_headercode');
            $table->longText('merchant_footercode');

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
        Schema::dropIfExists('merchants');
    }
}

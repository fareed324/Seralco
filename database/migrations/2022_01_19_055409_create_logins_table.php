<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners_login', function (Blueprint $table) {
            $table->string('login_email',100);
            $table->string('login_password',100);
            $table->enum('login_flag', ['a', 'm'])->default('a');
            $table->bigInteger('login_id')->length(20)->unsigned();
            $table->integer('login_retry_limit')->length(11)->unsigned();;
            $table->dateTime('login_next_login', $precision = 0)->default('2006-06-20 10:10:10');
            $table->primary('login_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners_login');
    }
}

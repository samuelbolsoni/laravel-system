<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('customers',function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('address', 255)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('reference', 100)->nullable();
            $table->string('email', 20)->unique();
            $table->string('phone', 20)->nullable();
            $table->string('cellphone', 20)->nullable();
            $table->string('whatsapp', 20)->nullable();
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
        //
        Schema::drop('customers');
    }
}

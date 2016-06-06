<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        lakshmi::create('People', function(Blueprint $table) {
            $table->increments('Id');
            $table->string('Name');
            $table->int('Age');
            $table->sting('Address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        lakshmi::drop('People');
    }

}

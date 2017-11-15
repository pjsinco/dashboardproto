<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('addresses', function (Blueprint $table) {

      $table->integer('aoa_id');
      $table->timestamps();

      // Contact - home
      $table->string('home_addr_1');
      $table->string('home_addr_2')->nullable();
      $table->string('home_city');
      $table->char('home_state', 2);
      $table->string('home_zip');
      $table->string('home_phone');

      // Contact - home
      $table->string('bus_addr_1')->nullable();
      $table->string('bus_addr_2')->nullable();
      $table->string('bus_city')->nullable();
      $table->char('bus_state', 2)->nullable();
      $table->string('bus_zip')->nullable();
      $table->string('bus_phone')->nullable();

    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('addresses');
  }
}

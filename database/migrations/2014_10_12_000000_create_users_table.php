<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {

      $table->increments('id');
      $table->string('name');
      $table->string('password');
      $table->rememberToken();
      $table->timestamps();

      // Personal
      $table->string('first_name');
      $table->string('middle_name')->nullable();
      $table->string('last_name');
      $table->string('suffix')->nullable();
      $table->string('designation');
      $table->string('email')->unique();
      $table->string('website')->nullable();

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

      // Membership
      $table->integer('aoa_id')->unsigned();
      $table->char('status', 4);
      $table->datetime('paid_thru')->nullable();
      $table->string('member_type');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}

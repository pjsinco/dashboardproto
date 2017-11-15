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

      $table->integer('aoa_id');

      $table->string('user_name');
      $table->string('password');
      $table->rememberToken();
      $table->timestamps();

      // Personal
      $table->string('first_name');
      $table->string('middle_name')->nullable();
      $table->string('last_name');
      $table->string('suffix')->nullable();
      $table->string('prefix')->nullable();
      $table->string('designation');
      $table->string('email')->unique();
      $table->string('website')->nullable();


      // Membership
      $table->char('status', 4);
      $table->datetime('paid_thru')->nullable();
      $table->string('member_type');
      $table->enum('preferred_contact', ['home', 'business']);
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

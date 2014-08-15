<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username')->nullable();
			$table->string('email')->unique();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('password')->nullable();
			$table->string('uid')->nullable();
			$table->string('oauth_token')->nullable();
			$table->string('oauth_token_secret')->nullable();
			$table->string('remember_token')->nullable();
			$table->boolean('isAdmin')->default(false);
			$table->string('avatar')->nullable();
			// activation
			$table->boolean('activated')->default(0);
			$table->string('activation_code')->nullable();
			$table->timestamp('activated_at')->nullable();
			// contact
			$table->string('website')->nullable();
            $table->string('twitter')->nullable();

            // $table->string('phone')->nullable();
            // $table->string('mobile')->nullable();
            // $table->string('fax')->nullable();

            $table->text('message')->nullable();
			$table->string('location')->nullable();
			$table->string('gender')->nullable();
			$table->timestamps();
			$table->timestamp('last_login');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

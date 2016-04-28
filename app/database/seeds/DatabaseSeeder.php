<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('reviews')->delete();
		DB::table('subscribers')->delete();
		

		$this->call('ReviewsSeeder');
		$this->call('SubscribersSeeder');
		$this->call('CommentsSeeder');
	}

}

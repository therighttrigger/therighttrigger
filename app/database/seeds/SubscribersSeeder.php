<?php
class SubscribersSeeder extends Seeder {

	public function run() {
		$subscriber = new Subscriber();
		$subscriber->name = "Reagan Wilkins";
		$subscriber->email = "reagan.wilkins@gmail.com";
		$subscriber->save();
	}
}
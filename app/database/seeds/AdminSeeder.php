<?php
class AdminSeeder extends Seeder {
	public function run() {
		$admin = new User();
		$admin->name = "Reagan Sean Thomas Wilkins";
		$admin->password = Hash::make('talilelianaashley');
		$admin->save();
	}
}
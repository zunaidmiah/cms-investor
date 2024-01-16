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

		$this->call('SentryGroupSeeder');
		$this->call('SentryUserSeeder');
		$this->call('SentryUserGroupSeeder');
	}

}
class SentryGroupSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('groups')->delete();
		Sentry::getGroupProvider()->create(array(
	        'name'        => 'Users',
	        'permissions' => array(
	            'admin' => 0,
	            'users' => 1,
	        )));
		Sentry::getGroupProvider()->create(array(
	        'name'        => 'Admins',
	        'permissions' => array(
	            'admin' => 1,
	            'users' => 1,
	        )));
	}
}
class SentryUserGroupSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users_groups')->delete();
		$userUser = Sentry::getUserProvider()->findByLogin('user@user.com');
		$adminUser = Sentry::getUserProvider()->findByLogin('admin@admin.com');
		$userGroup = Sentry::getGroupProvider()->findByName('Users');
		$adminGroup = Sentry::getGroupProvider()->findByName('Admins');
                // Assign the groups to the users
                $userUser->addGroup($userGroup);
                $adminUser->addGroup($userGroup);
                $adminUser->addGroup($adminGroup);
	}
}
class SentryUserSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();
		Sentry::getUserProvider()->create(array(
	        'email'    => 'admin@admin.com',
	        'password' => 'sentryadmin',
	        'activated' => 1,
	    ));
	    Sentry::getUserProvider()->create(array(
	        'email'    => 'user@user.com',
	        'password' => 'sentryuser',
	        'activated' => 1,
	    ));
	}
}

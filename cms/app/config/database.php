	<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| PDO Fetch Style
	|--------------------------------------------------------------------------
	|
	| By default, database results will be returned as instances of the PHP
	| stdClass object; however, you may desire to retrieve records in an
	| array format for simplicity. Here you can tweak the fetch style.
	|
	*/

	'fetch' => PDO::FETCH_CLASS,

	/*
	|--------------------------------------------------------------------------
	| Default Database Connection Name
	|--------------------------------------------------------------------------
	|
	| Here you may specify which of the database connections below you wish
	| to use as your default connection for all database work. Of course
	| you may use many connections at once using the Database library.
	|
	*/

	'default' => 'cms',

	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	|
	| Here are each of the database connections setup for your application.
	| Of course, examples of configuring each database platform that is
	| supported by Laravel is shown below to make development simple.
	|
	|
	| All database work in Laravel is done through the PHP PDO facilities
	| so make sure you have the driver for your particular database of
	| choice installed on your machine before you begin development.
	|
	*/

	'connections' => array(

		'sqlite' => array(
			'driver'   => 'sqlite',
			'database' => __DIR__.'/../database/production.sqlite',
			'prefix'   => '',
		),

		$_ENV['CONNECTION_NAME'] => array(
			'driver'    => $_ENV['DB_CONNECTION'],
			'host'      => $_ENV['DB_HOST'],
			'database'  => $_ENV['DB_DATABASE'],
			'username'  => $_ENV['DB_USERNAME'],
			'password'  => $_ENV['DB_PASSWORD'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
			'options'   => array(
				// Here is the time zone setting
				\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET time_zone = "+08:00"'
			)
		),
                $_ENV['CONNECTION_NAME2'] => array(
			'driver'    => $_ENV['DB_CONNECTION2'],
			'host'      => $_ENV['DB_HOST2'],
			'database'  => $_ENV['DB_DATABASE2'],
			'username'  => $_ENV['DB_USERNAME2'],
			'password'  => $_ENV['DB_PASSWORD2'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
		$_ENV['CONNECTION_NAME3'] => array(
			'driver'    => $_ENV['DB_CONNECTION3'],
			'host'      => $_ENV['DB_HOST3'],
			'database'  => $_ENV['DB_DATABASE3'],
			'username'  => $_ENV['DB_USERNAME3'],
			'password'  => $_ENV['DB_PASSWORD3'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
		$_ENV['CONNECTION_NAME9'] => array(
			'driver'    => $_ENV['DB_CONNECTION9'],
			'host'      => $_ENV['DB_HOST9'],
			'database'  => $_ENV['DB_DATABASE9'],
			'username'  => $_ENV['DB_USERNAME9'],
			'password'  => $_ENV['DB_PASSWORD9'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
        $_ENV['CONNECTION_NAME10'] => array(
			'driver'    => $_ENV['DB_CONNECTION10'],
			'host'      => $_ENV['DB_HOST10'],
			'database'  => $_ENV['DB_DATABASE10'],
			'username'  => $_ENV['DB_USERNAME10'],
			'password'  => $_ENV['DB_PASSWORD10'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
		 $_ENV['CONNECTION_NAME4'] => array(
			'driver'    => $_ENV['DB_CONNECTION4'],
			'host'      => $_ENV['DB_HOST4'],
			'database'  => $_ENV['DB_DATABASE4'],
			'username'  => $_ENV['DB_USERNAME4'],
			'password'  => $_ENV['DB_PASSWORD4'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),

		'pgsql' => array(
			'driver'   => 'pgsql',
			'host'     => 'localhost',
			'database' => 'forge',
			'username' => 'forge',
			'password' => '',
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		),

		'sqlsrv' => array(
			'driver'   => 'sqlsrv',
			'host'     => 'localhost',
			'database' => 'database',
			'username' => 'root',
			'password' => '',
			'prefix'   => '',
		),

	),

	/*
	|--------------------------------------------------------------------------
	| Migration Repository Table
	|--------------------------------------------------------------------------
	|
	| This table keeps track of all the migrations that have already run for
	| your application. Using this information, we can determine which of
	| the migrations on disk haven't actually been run in the database.
	|
	*/

	'migrations' => 'migrations',

	/*
	|--------------------------------------------------------------------------
	| Redis Databases
	|--------------------------------------------------------------------------
	|
	| Redis is an open source, fast, and advanced key-value store that also
	| provides a richer set of commands than a typical key-value systems
	| such as APC or Memcached. Laravel makes it easy to dig right in.
	|
	*/

	'redis' => array(

		'cluster' => false,

		'default' => array(
			'host'     => '127.0.0.1',
			'port'     => 6379,
			'database' => 0,
		),

	),

);
<?php

# Cron job command for Laravel 4.2 scheduled for every 15 minute


use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CronRunCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cron:run';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run the scheduler';

	/**
	 * Current timestamp when command is called.
	 *
	 * @var integer
	 */
	protected $timestamp;



	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->timestamp = time();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{

		// use the available schedules and pass it an anonymous function
		$this->everyFifteenMinutes(function()
		{

      $stockdata_from_yahoo = DB::connection('yahoo')->select('SELECT * FROM yahoo ORDER BY `id` DESC LIMIT 0,1');

		});

	}


	/**
	 * AVAILABLE SCHEDULES
	 */
	protected function everyFifteenMinutes(callable $callback)
	{
		if((int) date('i', $this->timestamp) % 15 === 0) call_user_func($callback);
	}

}
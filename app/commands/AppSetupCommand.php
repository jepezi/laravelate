<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AppSetupCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'app:setup';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Setup app.';


	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$this->comment('=====================================');
		$this->comment('');
		$this->info('  Setup');
		$this->comment('');
		$this->comment('-------------------------------------');
		$this->comment('');


		// Generate the Application Encryption key
		$this->call('key:generate');
		$this->info('Key generated.');

		$this->call('debugbar:publish');
		$this->info('Debugbar published.');
		
		// Run the Migrations
		// $this->call('migrate');

		// Seed the tables with dummy data
		// $this->call('db:seed');
	}

	

}
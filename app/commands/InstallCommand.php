<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class InstallCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'app:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

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
	 * @return mixed
	 */
	public function fire()
	{
        // Clear all search indices
        $client = new Elasticsearch\Client();
        $client->indices()->delete([
            'index' => 'tasks',
        ]);

        if(Schema::hasTable('migrations')) {
            $this->call('migrate:reset', ['--force' => true]);
        }

        $this->call('migrate', ['--package' => 'cartalyst/sentry', '--force' => true]);
        $this->call('migrate', ['--force' => true]);
        $this->call('db:seed', ['--force' => true]);

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}

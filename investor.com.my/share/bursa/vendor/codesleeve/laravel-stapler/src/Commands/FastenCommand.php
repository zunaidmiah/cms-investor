<?php namespace Codesleeve\LaravelStapler\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\View\Factory as View;
use Illuminate\Filesystem\Filesystem as File;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class FastenCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'stapler:fasten';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a migration for adding stapler file fields to a database table';

    /**
     * An instance of Laravel's view factory.
     * 
     * @var View
     */
    protected $view;

    /**
     * An instance of Laravel's filesystem.
     * 
     * @var File
     */
    protected $file;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(View $view, File $file)
    {
        parent::__construct();

        $this->view = $view;
        $this->file = $file;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->createMigration();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['table', InputArgument::REQUIRED, 'The name of the database table the file fields will be added to.'],
            ['attachment', InputArgument::REQUIRED, 'The name of the corresponding stapler attachment.'],
        ];
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

    /**
     * Create a new migration.
     *
     * @return void
     */
    protected function createMigration()
    {
        $data = ['table' => $this->argument('table'), 'attachment' => $this->argument('attachment')];
        $prefix = date('Y_m_d_His');
        $path = app_path() . '/database/migrations';

        if (!is_dir($path)) mkdir($path);

        $fileName  = $path . '/' . $prefix . '_add_' . $data['attachment'] . '_fields_to_' . $data['table'] . '_table.php';
        $data['className'] = 'Add' . ucfirst(Str::camel($data['attachment'])) . 'FieldsTo' . ucfirst(Str::camel($data['table'])) . 'Table';

        // Save the new migration to disk using the stapler migration view.
        $migration = $this->view->make('laravel-stapler::migration', $data)->render();
        $this->file->put($fileName, $migration);

        // Dump the autoloader and print a created migration message to the console.
        $this->call('dump-autoload');
        $this->info("Created migration: $fileName");
    }

}

<?php

namespace Milkwood\LaravelBackupper\Commands;

use Illuminate\Console\Command;
use Milkwood\LaravelBackupper\Classes\BackupDirectory;
use Milkwood\LaravelBackupper\Classes\DbBackupFile;


class BackupCleanerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:cleaner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up the backups delete old backups not needed anymore.';

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
    public function handle()
    {
        
        $backupDirectory = new BackupDirectory( DbBackupFile::getPath() );
        $backupDirectory->cleanUp();

        $this->info('Backups cleaned');

    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartApplication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start-application';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'start the application.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Start setup the application.');

        $this->info('Start install composer.');
        $this->composerInstall();

        $this->info('Start prepare .env file');
        $this->cpEnvFile();

        $this->info('Start migration.');
        $this->migrate();

        $this->info('Start seed users&admins.');
        $this->seed();

        $this->info('Done.');
    }

    private function cpEnvFile()
    {
        $source = base_path('.env.example');
        $destination = base_path('.env');

        if (!file_exists($source)) {
            $this->error('.env.example file does not exist.');
            return;
        }

        if (file_exists($destination)) {
            if (!$this->confirm('Do you want to overwrite the existing .env file?')) {
                return;
            }
        }

        if (copy($source, $destination)) {
            $this->info('.env file copied successfully.');
        } else {
            $this->error('Failed to copy .env file.');
        }
    }

    private function composerInstall()
    {
        passthru("composer install");
    }

    private function migrate()
    {
        passthru("php artisan migrate");
    }

    private function seed()
    {
        passthru("php artisan db:seed");
    }
}

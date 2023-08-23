<?php

namespace App\Console\Commands\System;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class UpgradeCommand extends Command
{
    protected $signature = 'easyshortener:upgrade {--force : Force migrations}';
    protected $description = 'Perform upgrade tasks for Easyshortener';

    protected $force;

    public function handle()
    {
        $this->force = $this->option('force');

        $this->output->title('Starting upgrade tasks...');

        $this->runTasks();

        $this->output->success('Upgrade tasks completed.');
    }

    protected function runTasks()
    {
        $this->buildAssets();        // Build assets with npm run build
        usleep(1000000);
        $this->runMigrations();      // Run database migrations
        usleep(1000000);
        $this->clearConfigCache();   // Clear configuration cache
        usleep(1000000);
        $this->clearViewCache();     // Clear view cache
        usleep(1000000);
    }

    protected function buildAssets()
    {
        $this->output->write('Building assets...');

        exec('npm run build', $output, $status);

        if ($status === 0) {
            $this->output->write(' [' . $this->green('✔') . ']', true); // Successful task (green checkmark)
        } else {
            $this->output->write(' [' . $this->red('✘') . ']', true); // Failed task (red cross)
        }
    }

    protected function runMigrations()
    {
        $this->output->write('Running database migrations...');

        Artisan::call('migrate', ['--no-ansi' => true, '--force' => $this->force]);
        $exitCode = trim(Artisan::output());

        if ($exitCode === 'INFO  Nothing to migrate.' || strpos($exitCode, 'Migration table created successfully') !== false) {
            $this->output->write(' [' . $this->green('✔') . ']', true); // Successful task (green checkmark)
        } elseif (strpos($exitCode, 'Migration(s) are ready to be migrated') !== false) {
            $this->output->write(' [' . $this->green('✔') . ']', true); // Successful task (green checkmark)
        } else {
            $this->output->write(' [' . $this->red('✘') . ']', true); // Failed task (red cross)
        }
    }

    protected function clearConfigCache()
    {
        $this->output->write('Clearing configuration cache...');

        Artisan::call('config:clear');
        $this->output->write(' [' . $this->green('✔') . ']', true); // Successful task (green checkmark)
    }

    protected function clearViewCache()
    {
        $this->output->write('Clearing view cache...');

        Artisan::call('view:clear');
        $this->output->write(' [' . $this->green('✔') . ']', true); // Successful task (green checkmark)
    }

    protected function green($text)
    {
        return "\033[32m" . $text . "\033[0m"; // Green color code for successful tasks
    }

    protected function red($text)
    {
        return "\033[31m" . $text . "\033[0m"; // Red color code for failed tasks
    }
}

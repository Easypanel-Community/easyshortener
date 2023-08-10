<?php

namespace App\Console\Commands;

use App\Notifications\UpdateNotification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableStyle;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Style\SymfonyStyle;

class Update extends Command
{
    protected $signature = 'easyshortener:update {--email : Send update notification email}';
    protected $description = 'Check for updates on Easyshortener';

    protected $owner = 'Easypanel-Community';
    protected $repo = 'Easyshortener';

    public function handle()
    {
        $currentVersion = "v" . config('easyshortener.version');
        $latestRelease = $this->getLatestRelease();

        if (!$latestRelease) {
            $this->error('Failed to retrieve the latest version of Easyshortener.');
            return;
        }

        $latestVersion = $latestRelease['name'];

        $this->line("Current Version: <fg=yellow>{$currentVersion}</>");
        $this->line("Latest Version: <fg=cyan>{$latestVersion}</>");

        if ($this->isNewVersionAvailable($currentVersion, $latestVersion)) {
            $this->info('A new version of Easyshortener is available.');

            if ($this->option('email')) {
                $this->sendUpdateNotificationEmail($latestVersion);
                $this->info('Update notification email sent.');
            }
        } else {
            $this->info('Easyshortener is up to date.');
        }
    }

    protected function getLatestRelease()
    {
        $response = Http::get("https://api.github.com/repos/{$this->owner}/{$this->repo}/releases/latest");

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    protected function isNewVersionAvailable($currentVersion, $latestVersion)
    {
        return version_compare($latestVersion, $currentVersion, '>');
    }

    protected function sendUpdateNotificationEmail($latestVersion)
    {
        if (config('easyshortener.update_email') === "") {
            $this->error('Update notification email is not set');
            return;
        }

        $userEmail = config('easyshortener.update_email'); // Notification email to send updates to

        $notification = new UpdateNotification($latestVersion);

        Notification::route('mail', $userEmail)->notify($notification);
    }
}

<?php

namespace App\Console\Commands\Link;

use App\Models\Link;
use Illuminate\Console\Command;

class LinkDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'link:delete {link_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes a link from your Easyshortener installation';

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
     * @return int
     */
    public function handle()
    {
        $link_id = $this->argument('link_id');
        $link = Link::find($link_id);

        if ($link === null) {
            $this->error("Invalid or non-existent link ID.");
            return 1;
        }

        if ($this->confirm('Are you sure you want to delete this link? ' . $link->url)) {
            $link->delete();
            $this->info("Link deleted.");
        }

        return 0;
    }
}

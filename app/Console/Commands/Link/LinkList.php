<?php

namespace App\Console\Commands\Link;

use App\Models\Link;
use Illuminate\Console\Command;

class LinkList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'link:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List links saved in Easyshortener';

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
        $headers = [ 'id', 'url', 'slug' ];
        $links = Link::all(['id', 'url', 'slug'])->toArray();
        $this->table($headers, $links);

        return 0;
    }
}

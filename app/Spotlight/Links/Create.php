<?php

namespace App\Spotlight\Links;

use App\Models\Link;
use Illuminate\Support\Collection;
use LivewireUI\Spotlight\Spotlight;
use LivewireUI\Spotlight\SpotlightCommand;
use LivewireUI\Spotlight\SpotlightCommandDependencies;
use LivewireUI\Spotlight\SpotlightCommandDependency;
use LivewireUI\Spotlight\SpotlightSearchResult;

class Create extends SpotlightCommand
{
    protected string $name = 'Create Link';

    protected string $description = 'Create a new link';


    public function dependencies(): ?SpotlightCommandDependencies
    {
        return SpotlightCommandDependencies::collection();
        // You can add additional dependencies here if needed
    }

    public function execute(Spotlight $spotlight): void
    {
        // Perform actions to create a new link
        // For example, you can redirect the user to a link creation page
        $url = route('links.create');

        $spotlight->redirect($url);
    }
}

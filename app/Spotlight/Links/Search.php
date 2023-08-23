<?php

namespace App\Spotlight\Links;

use App\Models\Link; // Adjust the namespace based on your Link model's location
use Illuminate\Support\Collection;
use LivewireUI\Spotlight\Spotlight;
use LivewireUI\Spotlight\SpotlightCommand;
use LivewireUI\Spotlight\SpotlightCommandDependencies;
use LivewireUI\Spotlight\SpotlightCommandDependency;
use LivewireUI\Spotlight\SpotlightSearchResult;

class Search extends SpotlightCommand
{
    protected string $name = 'Search Links';

    public function dependencies(): ?SpotlightCommandDependencies
    {
        return SpotlightCommandDependencies::collection()
            ->add(
                SpotlightCommandDependency::make('link')
                    ->setPlaceholder('Search for a link')
                    ->setType(SpotlightCommandDependency::SEARCH)
            );
    }

    public function searchLink(string $query): Collection
    {
        return Link::where('url', 'like', "%$query%")
            ->limit(15)
            ->get()
            ->map(function (Link $link) {
                return new SpotlightSearchResult(
                    $link->id,
                    $link->url,
                    '' // You can provide a description here if needed
                );
            });
    }

    public function execute(Spotlight $spotlight, Link $link): void
    {
        // Perform actions based on the selected link
        // For example, you can redirect the user to the link's details page
        $url = route('links.edit', $link);

        $spotlight->redirect($url);
    }
}

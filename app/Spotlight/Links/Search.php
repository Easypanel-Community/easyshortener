<?php

namespace App\Spotlight\Links;

use Illuminate\Support\Facades\Auth;
use LivewireUI\Spotlight\Spotlight;
use LivewireUI\Spotlight\SpotlightCommand;
use LivewireUI\Spotlight\SpotlightSearchResult;
use App\Models\Link;

class Search extends SpotlightCommand
{
    protected string $name = 'Search Links';

    protected string $description = 'Search for links';

    public function execute(Spotlight $spotlight): void
    {
        // Perform the search query and fetch links
        $query = $spotlight->getInput();
        $links = Link::where('url', 'like', "%$query%")
            ->orWhere('slug', 'like', "%$query%")
            ->get();

        // Create search results
        $searchResults = $links->map(function ($link) {
            return new SpotlightSearchResult(
                $link->id,
                $link->url,
                $link->slug,
                route('links.edit', $link->id)
            );
        });

        // Display search results
        $spotlight->searchResults($searchResults);
    }
}

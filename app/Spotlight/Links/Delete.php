<?php

namespace App\Spotlight\Links;

use App\Models\Link;
use Illuminate\Support\Collection;
use LivewireUI\Spotlight\Spotlight;
use LivewireUI\Spotlight\SpotlightCommand;
use LivewireUI\Spotlight\SpotlightCommandDependencies;
use LivewireUI\Spotlight\SpotlightCommandDependency;
use LivewireUI\Spotlight\SpotlightSearchResult;

class Delete extends SpotlightCommand
{
    protected string $name = 'Delete Link';

    protected string $description = 'Delete a link';

    public function dependencies(): ?SpotlightCommandDependencies
    {
        return SpotlightCommandDependencies::collection()
            ->add(
                SpotlightCommandDependency::make('link')
                    ->setPlaceholder('Which link do you want to delete?')
                    ->setType(SpotlightCommandDependency::SEARCH)
            );
    }

    public function searchLink(string $query): Collection
    {
        return auth()->user()
            ->links()
            ->where('slug', 'like', "%$query%")
            ->limit(15)
            ->get()
            ->map(function (Link $link) {
                return new SpotlightSearchResult(
                    $link->id,
                    $link->slug,
                    ''
                );
            });
    }

    public function execute(Spotlight $spotlight, Link $link): void
    {
        // Perform actions to delete the link
        // For example, you can prompt the user for confirmation and then delete the link
        $link->delete();

        // Optionally provide feedback to the user that the link has been deleted
        session()->flash('notification',
            [
                'type' => 'success',
                'message' => 'Successfully Deleted Link'
            ]);

        $url = route('links');

        $spotlight->redirect($url);
    }
}

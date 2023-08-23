<?php

namespace App\Spotlight;

use Illuminate\Support\Facades\Auth;
use LivewireUI\Spotlight\Spotlight;
use LivewireUI\Spotlight\SpotlightCommand;

class Logout extends SpotlightCommand
{
    protected string $name = 'Logout';

    protected string $description = 'Logout out of your account';

    public function execute(Spotlight $spotlight): void
    {
        Auth::logout();
        $spotlight->redirect('/');
    }
}

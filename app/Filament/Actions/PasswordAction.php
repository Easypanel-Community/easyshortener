<?php

namespace App\Filament\Actions;

use Filament\Forms;
use Filament\Pages\Actions\Action;

class PasswordAction extends Action
{
    protected function isPasswordSessionValid()
    {
        return (session()->has('auth.password_confirmed_at') && (time() - session('auth.password_confirmed_at', 0)) < 300); // We won't ask the user for their password again for 300s = 5mins
    }

    protected function setUp(): void
    {
        parent::setUp();

        if ($this->isPasswordSessionValid()) {
            // Password confirmation is still valid
            //
        } else {
            $this->requiresConfirmation()
                ->modalHeading("Confirm password")
                ->modalSubheading(
                    "Please confirm your password to complete this action."
                )
                ->form([
                    Forms\Components\TextInput::make("current_password")
                        ->required()
                        ->password()
                        ->rule("current_password"),
                ]);
        }
    }

    public function call(array $data = [])
    {
        // If the session already has a cookie, and it's still valid, we don't want to reset the time on it.
        if ($this->isPasswordSessionValid()) {
        } else {
            session(['auth.password_confirmed_at' => time()]);
        }

        parent::call($data);
    }
}

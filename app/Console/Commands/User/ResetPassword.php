<?php

namespace App\Console\Commands\User;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPassword extends Command
{
    protected $signature = 'user:reset
        {id? : The ID of the user to reset the password for}
        {email? : The email address of the user to reset the password for}';

    protected $description = 'Reset a user\'s password';

    public function handle()
    {
        $id = $this->argument('id');
        $email = $this->argument('email');

        if (is_null($id) && is_null($email)) {
            $this->error('You must specify either the ID or email address of the user to reset the password for.');
            return;
        }

        if (!is_null($id)) {
            $user = User::find($id);
        } else {
            $user = User::where('email', $email)->first();
        }

        if (is_null($user)) {
            $this->error('Could not find a user with the specified ID or email address.');
            return;
        }

        $newPassword = Str::random(18);
        $user->password = Hash::make($newPassword);
        $user->save();

        $this->info('Password reset for user ID ' . $user->id . ' (' . $user->email . ').');
        $this->info('The new password is: ' . $newPassword);
    }
}

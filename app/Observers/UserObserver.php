<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\User;

class UserObserver
{
    public function created(User $user): void
    {
        $domain = substr($user->email, strpos($user->email, '@') + 1);
        $client = Client::where('email_domain', $domain)->first();

        if ($client) {
            $user->update([
                'client_id' => $client->id,
                'role' => 'user',
            ]);
        } else {
            $user->delete();
        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}

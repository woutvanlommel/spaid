<?php

namespace App\Filament\Pages\Auth;

use App\Models\Client;
use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use SensitiveParameter;

class Register extends BaseRegister
{
    protected function handleRegistration(#[SensitiveParameter] array $data): Model
    {
        $domain = substr($data['email'], strpos($data['email'], '@') + 1);

        if (!Client::where('email_domain', $domain)->exists()) {
            Notification::make()
                ->danger()
                ->title('Registratie mislukt')
                ->body('Het email domein "' . $domain . '" is niet geregistreerd.')
                ->send();

            throw ValidationException::withMessages([
                'email' => 'Dit email domein is niet geregistreerd.',
            ]);
        }

        return $this->getUserModel()::create($data);
    }
}

<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
// use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = bcrypt(Str::random(32));

        return $data;
    }

    // protected function afterCreate(): void
    // {
    //     Password::sendResetLink([
    //         'email' => $this->record->email,
    //     ]);
    // }
}

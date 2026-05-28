<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Bedrijfsnaam')
                    ->required(),
                TextInput::make('email_domain')
                    ->label('Email domein')
                    ->required(),
            ]);
    }
}

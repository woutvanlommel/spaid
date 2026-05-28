<?php

namespace App\Filament\Resources\Conditions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ConditionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Naam')
                    ->required(),
            ]);
    }
}

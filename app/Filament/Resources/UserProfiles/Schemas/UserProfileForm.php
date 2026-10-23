<?php

namespace App\Filament\Resources\UserProfiles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(UserProfile::class, 'email', ignoreRecord: true), // <--- Sprawdza czy e-mail jest unikalny w tabeli UserProfile, ignorując aktualnie edytowany rekord
                TextInput::make('password')
                    ->password()
                    // Haszujemy hasło dopiero przed zapisem, jeśli zostało podane
                    ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                    ->required(fn (string $context): bool => $context === 'create')
                    ->maxLength(255),
            ]);
    }
}

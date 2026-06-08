<?php

namespace App\Filament\Resources\Artists\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ArtistForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),

                TextInput::make('country')
                    ->label('País')
                    ->maxLength(255),

                TextInput::make('image')
                    ->label('URL de imagen')
                    ->placeholder('https://i.scdn.co/image/...')
                    ->url(),

                Textarea::make('bio')
                    ->label('Biografía')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}

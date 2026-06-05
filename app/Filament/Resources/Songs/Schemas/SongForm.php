<?php

namespace App\Filament\Resources\Songs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SongForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('artist_id')
                    ->label('Artista')
                    ->relationship('artist', 'name')
                    ->searchable()
                    ->required(),

                Select::make('album_id')
                    ->label('Álbum')
                    ->relationship('album', 'title')
                    ->searchable()
                    ->required(),

                TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->maxLength(255),

                TextInput::make('track_number')
                    ->label('Número de pista')
                    ->numeric(),

                TextInput::make('duration')
                    ->label('Duración (segundos)')
                    ->numeric(),

                FileUpload::make('file_path')
                    ->label('Archivo de audio')
                    ->acceptedFileTypes(['audio/mpeg', 'audio/wav', 'audio/ogg'])
                    ->directory('songs'),
            ]);
    }
}

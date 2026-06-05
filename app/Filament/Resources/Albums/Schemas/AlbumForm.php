<?php

namespace App\Filament\Resources\Albums\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AlbumForm
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

                TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->maxLength(255),

                Select::make('type')
                    ->label('Tipo')
                    ->options([
                        'album'  => 'Álbum',
                        'single' => 'Single',
                        'ep'     => 'EP',
                    ])
                    ->default('album')
                    ->required(),

                DatePicker::make('release_date')
                    ->label('Fecha de lanzamiento'),

                FileUpload::make('cover')
                    ->label('Portada')
                    ->image()
                    ->directory('albums'),
            ]);
    }
}

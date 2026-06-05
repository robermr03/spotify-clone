<?php

namespace App\Filament\Resources\Songs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SongsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('artist.name')
                    ->label('Artista')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('album.title')
                    ->label('Álbum')
                    ->searchable(),

                TextColumn::make('track_number')
                    ->label('Pista')
                    ->sortable(),

                TextColumn::make('duration')
                    ->label('Duración')
                    ->formatStateUsing(fn($state) => $state ? gmdate('i:s', $state) : '-'),

                TextColumn::make('play_count')
                    ->label('Reproducciones')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

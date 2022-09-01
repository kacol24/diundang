<?php

namespace App\Filament\Resources\SeatingResource\RelationManagers;

use App\Events\InvitationUpdated;
use App\Filament\Resources\InvitationResource;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;

class InvitationsRelationManager extends RelationManager
{
    protected static string $relationship = 'invitations';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return InvitationResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('guest_code')
                      ->searchable(),
            TextColumn::make('full_name')
                      ->searchable(['name']),
            TextColumn::make('name')
                      ->toggleable(isToggledHiddenByDefault: true),
            TagsColumn::make('notes')
                      ->separator(', ')
                      ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('group.group_name')
                      ->toggleable(),
            BooleanColumn::make('is_family')
                         ->toggleable(),
            BooleanColumn::make('is_teapai')
                         ->toggleable(),
            TextColumn::make('guests')
                      ->label('Max Guests')
                      ->toggleable(),
            BooleanColumn::make('is_attending')
                         ->toggleable(),
            TextColumn::make('rsvp_at')->dateTime()
                      ->sortable()
                      ->toggleable(),
            TextColumn::make('pax')
                      ->toggleable(),
        ])
                     ->filters([
                         //
                     ])
                     ->headerActions([
                         //Tables\Actions\CreateAction::make(),
                     ])
                     ->actions([
                         Tables\Actions\ViewAction::make(),
                         Tables\Actions\EditAction::make(),
                         Tables\Actions\DeleteAction::make(),
                     ])
                     ->bulkActions([
                         //Tables\Actions\DeleteBulkAction::make(),
                     ]);
    }
}

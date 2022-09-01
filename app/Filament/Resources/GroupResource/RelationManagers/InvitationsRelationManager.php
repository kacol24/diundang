<?php

namespace App\Filament\Resources\GroupResource\RelationManagers;

use App\Events\InvitationUpdated;
use App\Filament\Resources\InvitationResource;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
            TextColumn::make('seating.name')
                      ->label('Table')
                      ->toggleable(),
            TextColumn::make('guests')
                      ->label('Max Guests')
                      ->toggleable(),
            BooleanColumn::make('is_family')
                         ->action(function ($record) {
                             $record->is_family = ! $record->is_family;
                             $record->save();

                             event(new InvitationUpdated($record));
                         })
                         ->toggleable(),
            BooleanColumn::make('is_teapai')
                         ->action(function ($record) {
                             $record->is_teapai = ! $record->is_teapai;
                             $record->save();

                             event(new InvitationUpdated($record));
                         })
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
                         //Tables\Actions\EditAction::make(),
                         Tables\Actions\ViewAction::make(),
                         Tables\Actions\DeleteAction::make(),
                     ])
                     ->bulkActions([
                         //Tables\Actions\DeleteBulkAction::make(),
                     ]);
    }
}

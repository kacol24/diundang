<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RsvpResource\Pages;
use App\Filament\Resources\RsvpResource\RelationManagers;
use App\Models\Invitation;
use App\Models\Rsvp;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RsvpResource extends Resource
{
    protected static ?string $navigationGroup = 'Invitations';

    protected static ?string $model = Invitation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $modelLabel = 'RSVP';

    protected static ?string $pluralModelLabel = 'RSVP';

    protected static ?string $navigationLabel = 'RSVP';

    protected static ?string $recordRouteKeyName = 'rsvp';

    protected static ?string $slug = 'rsvp';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        TextInput::make('guest_code')
                                 ->unique(ignorable: fn(?Model $record): ?Model => $record),
                        DateTimePicker::make('rsvp_at')
                                      ->label('RSVP At'),
                    ]),
                Grid::make()
                    ->schema([
                        Select::make('is_attending')
                              ->options([
                                  1 => 'Yes',
                                  0 => 'No',
                              ])
                              ->label('Attend'),
                        TextInput::make('pax')
                                 ->numeric(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('guest_code')
                          ->searchable(),
                TextColumn::make('full_name')
                          ->searchable(['name']),
                TextColumn::make('group.group_name')
                          ->toggleable(),
                TextColumn::make('guests')
                          ->label('Max Guests')
                          ->toggleable(),
                TextColumn::make('seating.name')
                          ->label('Table')
                          ->toggleable(isToggledHiddenByDefault: true),
                TagsColumn::make('notes')
                          ->separator(', ')
                          ->toggleable(isToggledHiddenByDefault: true),
                BooleanColumn::make('is_attending'),
                TextColumn::make('rsvp_at')->dateTime()
                          ->sortable(),
                TextColumn::make('pax'),
            ])
            ->filters([
                MultiSelectFilter::make('group_id')
                                 ->label('Group')
                                 ->options(\App\Models\Group::all()->pluck('group_name', 'id')),
                MultiSelectFilter::make('seating_id')
                                 ->label('Table')
                                 ->relationship('seating', 'name'),
                Filter::make('notes')
                      ->form([
                          TextInput::make('search')->label('Notes'),
                      ])->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['search'],
                            fn(Builder $query, $term): Builder => $query->where('notes', 'like', '%'.$term.'%')
                        );
                    }),
                TernaryFilter::make('is_attending'),
                TernaryFilter::make('rsvp_at')
                             ->label('RSVP')
                             ->nullable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                //Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('rsvp_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageRsvps::route('/'),
        ];
    }
}

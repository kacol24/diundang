<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AngpaoResource\Pages;
use App\Filament\Resources\AngpaoResource\RelationManagers;
use App\Models\Angpao;
use App\Models\Attendance;
use App\Models\Invitation;
use Filament\Forms;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AngpaoResource extends Resource
{
    protected static ?string $navigationGroup = 'Invitations';

    protected static ?int $navigationSort = 3;

    protected static ?string $model = Invitation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $modelLabel = 'Angpao';

    protected static ?string $pluralModelLabel = 'Angpao';

    protected static ?string $navigationLabel = 'Angpao';

    protected static ?string $recordRouteKeyName = 'angpao';

    protected static ?string $slug = 'angpao';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('guest_code')
                                          ->disabled(),
                Forms\Components\TextInput::make('full_name')
                                          ->disabled(),
                Forms\Components\TextInput::make('angpao')
                                          ->numeric()
                                          ->mask(fn(Mask $mask) => $mask->money('', '.', 0))
                                          ->step(10000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('attendance.serial_number')
                          ->label('Serial Number')
                          ->searchable(query: function (Builder $query, $search): Builder {
                              $search = strtoupper($search);

                              return $query->whereHas('attendance', function ($query) use ($search) {
                                  return $query->where('sequence', 'like', "{$search}%");
                              });
                          }, isIndividual: true)
                          ->sortable(query: function (Builder $query, $direction): Builder {
                              return $query->whereHas('attendance', function ($query) use ($direction) {
                                  return $query->orderBy('sequence', $direction);
                              });
                          }),
                TextColumn::make('guest_code')
                          ->searchable(),
                TextColumn::make('full_name')
                          ->searchable(['name']),
                TextColumn::make('name')
                          ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('group.group_name')
                          ->toggleable(),
                BooleanColumn::make('is_attending'),
                TextColumn::make('angpao')
                          ->prefix('Rp')
                          ->sortable()
                          ->formatStateUsing(fn($state) => number_format($state, 0, ',', '.')),
            ])
            ->filters([
                MultiSelectFilter::make('sequence_group')
                                 ->label('By usher')
                                 ->options(
                                     Attendance::get()
                                               ->unique('sequence_group')
                                               ->pluck('sequence_group', 'sequence_group')
                                 )
                                 ->query(function (Builder $query, array $data): Builder {
                                     return $query->when(
                                         $data['values'],
                                         fn(Builder $query, $sequenceGroup): Builder => $query->whereHas('attendance',
                                             function ($query) use ($sequenceGroup) {
                                                 return $query->whereIn('sequence_group', $sequenceGroup);
                                             }),
                                     );
                                 }),
                MultiSelectFilter::make('group_id')
                                 ->label('Group')
                                 ->options(\App\Models\Group::all()->pluck('group_name', 'id')),
                TernaryFilter::make('is_bride')
                             ->label('Pihak')
                             ->trueLabel('Bride')
                             ->falseLabel('Groom')
                             ->queries(
                                 true: fn(Builder $query) => $query->whereHas('group', function ($query) {
                                     return $query->where('is_bride', true);
                                 }),
                                 false: fn(Builder $query) => $query->whereHas('group', function ($query) {
                                     return $query->where('is_bride', false);
                                 }),
                             ),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAngpaos::route('/'),
        ];
    }
}

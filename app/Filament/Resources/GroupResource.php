<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GroupResource\Pages;
use App\Filament\Resources\GroupResource\RelationManagers\InvitationsRelationManager;
use App\Models\Group;
use App\Models\Seating;
use Carbon\Carbon;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;

class GroupResource extends Resource
{
    protected static ?string $navigationGroup = 'Master';

    protected static ?string $model = Group::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                Checkbox::make('is_bride')
                        ->inline(false),
                Select::make('seating_id')
                      ->label('Table')
                      ->options(Seating::all()->pluck('table_dropdown', 'id')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('group_name'),
                TextColumn::make('invitations_count')
                          ->counts('invitations'),
                TextColumn::make('invitations_sum_guests')
                          ->sum('invitations', 'guests')
                          ->label('Est. Guests'),
                TextColumn::make('invitations_sum_pax')
                          ->sum('invitations', 'pax')
                          ->label('Pax'),
                TextColumn::make('seating.name')
                          ->label('Table'),
                BooleanColumn::make('is_bride')
                             ->sortable()
                             ->action(function ($record) {
                                 $record->is_bride = ! $record->is_bride;
                                 $record->save();
                             }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('send_wa')
                                     ->label('WhatsApp')
                                     ->url(function (Group $record) {
                                         return 'https://wa.me/?text='.urlencode(view('whatsapp',
                                                 [
                                                     'groomName'  => 'Kevin Chandra',
                                                     'guestName'  => $record->name,
                                                     'brideName'  => 'Fernanda Eka Putri',
                                                     'linkToSite' => route('home', ['for' => $record->name]),
                                                     'dueDate'    => Carbon::parse('2022-09-24')->subMonth()
                                                                           ->format('d F Y'),
                                                     'reverse'    => $record->is_bride,
                                                 ])->render());
                                     })
                                     ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->reorderable('order_column')
            ->defaultSort('order_column');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGroups::route('/'),
            'view'  => Pages\ViewGroup::route('/{record}'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            InvitationsRelationManager::class,
        ];
    }
}

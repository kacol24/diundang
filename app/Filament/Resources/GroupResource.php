<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GroupResource\Pages;
use App\Models\Group;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class GroupResource extends Resource
{
    protected static ?string $navigationGroup = 'Master';

    protected static ?string $model = Group::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\Checkbox::make('is_bride')
                                         ->inline(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('invitations_count')
                                         ->counts('invitations'),
                Tables\Columns\TextColumn::make('invitations_sum_pax')
                                         ->sum('invitations', 'pax')
                                         ->label('Pax'),
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGroups::route('/'),
        ];
    }
}

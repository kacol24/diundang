<?php

namespace App\Filament\Resources;

use App\Events\InvitationUpdated;
use App\Filament\Resources\InvitationResource\Pages;
use App\Models\Invitation;
use App\Models\Seating;
use Carbon\Carbon;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class InvitationResource extends Resource
{
    protected static ?string $navigationGroup = 'Invitations';

    protected static ?string $model = Invitation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::getFormSchema())
            ->columns([
                'sm' => 3,
                'lg' => null,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('guest_code')
                          ->searchable(),
                TextColumn::make('full_name')
                          ->searchable(),
                BooleanColumn::make('is_teapai')
                             ->action(function ($record) {
                                 $record->is_teapai = ! $record->is_teapai;
                                 $record->save();

                                 event(new InvitationUpdated($record));
                             })
                             ->toggleable(),
                TextColumn::make('group.name'),
                TextColumn::make('guests')
                          ->label('Max Guests'),
                TextColumn::make('seating.name')
                          ->label('Table'),
                BooleanColumn::make('is_attending'),
                TextColumn::make('rsvp_at')->dateTime(),
                TextColumn::make('pax')->toggleable(isToggledHiddenByDefault: true),
                BooleanColumn::make('is_family')
                             ->action(function ($record) {
                                 $record->is_family = ! $record->is_family;
                                 $record->save();

                                 event(new InvitationUpdated($record));
                             })
                             ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                MultiSelectFilter::make('group_id')
                                 ->label('Group')
                                 ->options(\App\Models\Group::all()->pluck('group_name', 'id')),
                MultiSelectFilter::make('seating_id')
                                 ->label('Table')
                                 ->relationship('seating', 'name'),
                TernaryFilter::make('is_teapai'),
                TernaryFilter::make('is_attending'),
                TernaryFilter::make('rsvp_at')
                             ->label('RSVP')
                             ->nullable(),
            ])
            ->actions([
                Tables\Actions\Action::make('send_wa')
                                     ->label('WhatsApp')
                                     ->url(function (Invitation $record) {
                                         return "https://wa.me/{$record->whatsapp_phone}?text=".urlencode(view('whatsapp',
                                                 [
                                                     'groomName'   => 'Kevin Chandra',
                                                     'brideName'   => 'Fernanda Eka Putri',
                                                     'guestName'   => $record->full_name ?: 'Mr. / Mrs. / Ms.',
                                                     'linkToSite'  => route('home', ['guest' => $record->guest_code]),
                                                     'dueDate'     => Carbon::parse('2022-08-30')->format('d F Y'),
                                                     'isAttending' => $record->is_attending,
                                                     'reverse'     => optional($record->group)->is_bride,
                                                 ])->render());
                                     })
                                     ->openUrlInNewTab(),
                //Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->appendBulkActions([
                Tables\Actions\BulkAction::make('print_selected')
                                         ->action(
                                             fn(Collection $records) => redirect()->route('print', ['invitations' => $records->pluck('id')->implode(',')])
                                         )
                                         ->requiresConfirmation()
                                         ->icon('heroicon-o-printer'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListInvitations::route('/'),
            'create' => Pages\CreateInvitation::route('/create'),
            'edit'   => Pages\EditInvitation::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema()
    {
        return [
            Group::make()
                 ->schema([
                     Section::make('Guest Detail')
                            ->schema([
                                Grid::make()
                                    ->schema([
                                        MultiSelect::make('title')
                                                   ->options([
                                                       'Mr.'        => 'Mr.',
                                                       'Mrs.'       => 'Mrs.',
                                                       'Mr. & Mrs.' => 'Mr. & Mrs.',
                                                       'dr.'        => 'dr.',
                                                       'drg.'       => 'drg.',
                                                   ]),
                                        TextInput::make('name')
                                                 ->required(),
                                    ]),
                                TextInput::make('phone')
                                         ->type('tel')
                                         ->prefix('+62'),
                                Checkbox::make('is_teapai')
                                        ->inline(false),
                            ]),
                     Section::make('Invitation Detail')
                            ->schema([
                                Select::make('group_id')
                                      ->label('Group')
                                      ->options(\App\Models\Group::all()->pluck('group_name', 'id'))
                                      ->searchable(),
                                Select::make('seating_id')
                                      ->label('Table')
                                      ->options(Seating::all()->pluck('table_dropdown', 'id'))
                                      ->searchable(),
                                TextInput::make('guests')
                                         ->required()
                                         ->type('number')
                                         ->suffix('person(s)')
                                         ->default(2)
                                         ->minValue(1),
                            ]),
                 ])->columnSpan([
                    'sm' => 2,
                ]),
            Group::make()
                 ->schema([
                     Section::make('RSVP Detail')
                            ->schema([
                                TextInput::make('guest_code')
                                         ->unique(ignorable: fn(?Model $record): ?Model => $record),
                                Select::make('is_attending')
                                      ->options([
                                          1 => 'Attending',
                                          0 => 'Not Attending',
                                      ]),
                                DateTimePicker::make('rsvp_at')
                                              ->label('RSVP At'),
                                Grid::make()
                                    ->schema([
                                        TextInput::make('pax')
                                                 ->numeric(),
                                        Checkbox::make('is_family')
                                                ->inline(false),
                                    ]),
                            ]),
                 ])
                 ->columnSpan(1),
        ];
    }
}

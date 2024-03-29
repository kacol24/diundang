<?php

namespace App\Filament\Resources;

use App\Events\InvitationUpdated;
use App\Filament\Resources\InvitationResource\Pages;
use App\Models\Invitation;
use App\Models\Seating;
use App\Settings\BadWordsSettings;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class InvitationResource extends Resource
{
    protected static ?string $navigationGroup = 'Invitations';

    protected static ?string $model = Invitation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form->schema(static::getFormSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('guest_code')
                          ->searchable(),
                TextColumn::make('full_name')
                          ->searchable(['name']),
                TextColumn::make('name')
                          ->toggleable(isToggledHiddenByDefault: true),
                TagsColumn::make('notes')
                          ->separator(', ')
                          ->toggleable(),
                TextColumn::make('group.group_name'),
                TextColumn::make('seating.name')
                          ->label('Table'),
                TextColumn::make('guests')
                          ->label('Max Guests'),
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
            ])
            ->filters([
                Filter::make('notes')
                      ->form([
                          TagsInput::make('search')->label('Notes'),
                      ])->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['search'],
                            function ($query, $terms) {
                                foreach ($terms as $term) {
                                    $query->where('notes', 'like', '%'.$term.'%');
                                }

                                return $query;
                            }
                        );
                    }),
                MultiSelectFilter::make('group_id')
                                 ->label('Group')
                                 ->options(\App\Models\Group::ordered()->get()->pluck('group_name', 'id')),
                MultiSelectFilter::make('seating_id')
                                 ->label('Table')
                                 ->options(Seating::all()->pluck('table_dropdown', 'id')),
                TernaryFilter::make('is_teapai'),
                TernaryFilter::make('is_family'),
            ])
            ->actions([
                Action::make('send_wa')
                      ->label('WhatsApp')
                      ->url(function (Invitation $record) {
                          $waUrl = "https://wa.me/{$record->whatsapp_phone}?text=".urlencode(view('whatsapp',
                                  [
                                      'groomName'    => 'Kevin Chandra',
                                      'brideName'    => 'Fernanda Eka Putri',
                                      'guestName'    => $record->full_name ?: 'Mr. / Mrs. / Ms.',
                                      'linkToSite'   => route('home', ['guest' => $record->guest_code]),
                                      'dueDate'      => app(BadWordsSettings::class)->due_date,
                                      'isAttending'  => $record->is_attending,
                                      'reverse'      => optional($record->group)->is_bride,
                                      'downloadLink' => route('download', ['guest' => $record->guest_code]),
                                  ])->render());

                          return $waUrl;
                      })
                      ->openUrlInNewTab(),
                //Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->prependBulkActions([
                BulkAction::make('edit')
                          ->form([
                              Grid::make()
                                  ->schema([
                                      Checkbox::make('update_group')
                                              ->label('Update')
                                              ->inline(false),
                                      Select::make('group_id')
                                            ->label('Group')
                                            ->options(\App\Models\Group::ordered()->get()->pluck('group_name', 'id'))
                                            ->columnSpan(3),
                                  ])
                                  ->columns(4),
                              Grid::make()
                                  ->schema([
                                      Checkbox::make('update_seating')
                                              ->label('Update')
                                              ->inline(false),
                                      Select::make('seating_id')
                                            ->label('Table')
                                            ->options(Seating::all()->pluck('table_dropdown', 'id'))
                                            ->columnSpan(3),
                                  ])
                                  ->columns(4),
                              Grid::make()
                                  ->schema([
                                      Checkbox::make('update_guests')
                                              ->label('Update')
                                              ->inline(false),
                                      TextInput::make('guests')
                                               ->label('Max. Guests')
                                               ->required()
                                               ->type('number')
                                               ->suffix('person(s)')
                                               ->default(2)
                                               ->minValue(1)
                                               ->columnSpan(3),
                                  ])
                                  ->columns(4),
                              Grid::make()
                                  ->schema([
                                      Checkbox::make('update_notes')
                                              ->label('Update')
                                              ->inline(false),
                                      TagsInput::make('notes')->separator(', ')
                                               ->columnSpan(3),
                                  ])
                                  ->columns(4),
                          ])
                          ->action(function (Collection $records, array $data): void {
                              foreach ($records as $record) {
                                  if ($data['update_group']) {
                                      $record->group_id = $data['group_id'];
                                  }
                                  if ($data['update_seating']) {
                                      $record->seating_id = $data['seating_id'];
                                  }
                                  if ($data['update_guests']) {
                                      $record->guests = $data['guests'];
                                  }
                                  if ($data['update_notes']) {
                                      $record->notes = $data['notes'];
                                  }
                                  $record->save();

                                  event(new InvitationUpdated($record));
                              }
                          })
                          ->color('primary')
                          ->icon('heroicon-o-pencil')
                          ->requiresConfirmation(),
                BulkAction::make('print_label')
                          ->action(
                              fn(Collection $records, array $data) => redirect()->route('label', [
                                  'paper'       => $data['paper'],
                                  'break'       => $data['break'],
                                  'invitations' => $records->pluck('id')->implode(','),
                              ])
                          )
                          ->requiresConfirmation()
                          ->deselectRecordsAfterCompletion()
                          ->form([
                              Radio::make('paper')
                                   ->options([
                                       'A3'           => 'A3',
                                       'A4'           => 'A4',
                                       'A3_LANDSCAPE' => 'A3 Landscape',
                                       'A4_LANDSCAPE' => 'A4 Landscape',
                                   ])
                                   ->default('A3'),
                              Radio::make('break')
                                   ->options([
                                       'break'             => 'Normal Break',
                                       'break_with_margin' => 'Break W/ Margin',
                                   ])
                                   ->default('break'),
                          ])
                          ->icon('heroicon-o-printer'),
                BulkAction::make('print_selected')
                          ->action(
                              fn(Collection $records, array $data) => redirect()->route('print', [
                                  'paper'       => $data['paper'],
                                  'break'       => $data['break'],
                                  'invitations' => $records->pluck('id')->implode(','),
                              ])
                          )
                          ->requiresConfirmation()
                          ->deselectRecordsAfterCompletion()
                          ->form([
                              Radio::make('paper')
                                   ->options([
                                       'A3'           => 'A3',
                                       'A4'           => 'A4',
                                       'A3_LANDSCAPE' => 'A3 Landscape',
                                       'A4_LANDSCAPE' => 'A4 Landscape',
                                   ])
                                   ->default('A3'),
                              Radio::make('break')
                                   ->options([
                                       'break'             => 'Normal Break',
                                       'break_with_margin' => 'Break W/ Margin',
                                   ])
                                   ->default('break'),
                          ])
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
            Section::make('Guest Detail')
                   ->schema([
                       Grid::make()
                           ->schema([
                               MultiSelect::make('title')
                                          ->options([
                                              'Mr.'        => 'Mr.',
                                              'Mrs.'       => 'Mrs.',
                                              'Mr. & Mrs.' => 'Mr. & Mrs.',
                                              'Ms.'        => 'Ms.',
                                              'dr.'        => 'dr.',
                                              'drg.'       => 'drg.',
                                          ]),
                               TextInput::make('name')
                                        ->required(),
                           ]),
                       Grid::make()
                           ->schema([
                               TextInput::make('phone')
                                        ->type('tel')
                                        ->prefix('+62'),
                               TagsInput::make('notes')->separator(', '),
                           ]),
                   ]),
            Grid::make()
                ->schema([
                    Section::make('Invitation Detail')
                           ->columnSpan(1)
                           ->schema([
                               Grid::make()
                                   ->schema([
                                       Select::make('group_id')
                                             ->label('Group')
                                             ->searchable()
                                             ->options(\App\Models\Group::ordered()->get()->pluck('group_name', 'id')),
                                       Select::make('seating_id')
                                             ->label('Table')
                                             ->searchable()
                                             ->options(Seating::get()->pluck('table_dropdown', 'id')),
                                   ]),
                               Grid::make()
                                   ->columns(4)
                                   ->schema([
                                       TextInput::make('guests')
                                                ->required()
                                                ->type('number')
                                                ->suffix('person(s)')
                                                ->default(2)
                                                ->minValue(1)
                                                ->columnSpan(2),
                                       Checkbox::make('is_family')
                                               ->label('Family')
                                               ->inline(false),
                                       Checkbox::make('is_teapai')
                                               ->label('Teapai')
                                               ->inline(false),
                                   ]),
                           ]),
                    Section::make('RSVP Detail')
                           ->columnSpan(1)
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
                           ]),
                ]),
        ];
    }
}

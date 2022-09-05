<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\AttendanceForm;
use App\Filament\Resources\AttendanceResource\AttendanceTable;
use App\Filament\Resources\AttendanceResource\Pages;
use App\Models\Attendance;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\MultiSelectFilter;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form->schema(AttendanceForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(AttendanceTable::columns())
            ->filters([
                MultiSelectFilter::make('sequence_group')
                                 ->label('By usher')
                                 ->options(
                                     Attendance::get()
                                               ->unique('sequence_group')
                                               ->pluck('sequence_group', 'sequence_group')
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
            'index' => Pages\ManageAttendances::route('/'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Models\Comment;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Checkbox::make('is_approved'),
                Forms\Components\Grid::make()
                                     ->schema([
                                         Forms\Components\TextInput::make('name'),
                                         Forms\Components\Select::make('invitation_id')
                                                                ->relationship('invitation', 'name'),
                                     ]),
                Forms\Components\Textarea::make('message')
                                         ->rows(10),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BooleanColumn::make('is_approved')
                                            ->action(function ($record) {
                                                $record->is_approved = ! $record->is_approved;
                                                $record->save();
                                            }),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('message')
                                         ->limit(50),
                Tables\Columns\TextColumn::make('created_at')
                                         ->sortable()
                                         ->dateTime(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                //Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageComments::route('/'),
        ];
    }
}

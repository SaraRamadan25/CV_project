<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\Category;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\Layout\View;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->required()->rules('email'),
                Forms\Components\DatePicker::make('date_of_birth')->required(),
                Forms\Components\TextInput::make('excerpt')->required(),
                Forms\Components\TextInput::make('description')->required(),
               Forms\Components\Select::make('User Education')
                   ->options(Education::pluck('name', 'id')),
                Forms\Components\Select::make('User Experience')
                    ->options(Experience::pluck('name', 'id'))
                        ->multiple(),


        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('email')->sortable(),
                Tables\Columns\TextColumn::make('date_of_birth')->sortable(),
                Tables\Columns\TextColumn::make('excerpt'),
                Tables\Columns\TextColumn::make('projects.name')->label('Project Name'),




            ])
            ->filters([
                // your filters here
            ])

            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

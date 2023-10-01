<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LogsResource\Pages;
use App\Filament\Resources\LogsResource\RelationManagers;
use App\Models\Logs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class LogsResource extends Resource
{
    protected static ?string $model = Logs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('loja')
                ->searchable(),
            Tables\Columns\TextColumn::make('host')
                ->searchable(),
            Tables\Columns\TextColumn::make('ip')
                ->searchable(),
            Tables\Columns\TextColumn::make('datahora')
                ->label('Captura')
                ->dateTime('d-m-Y H:i:s')
                ->sortable(),
            Tables\Columns\TextColumn::make('marca')
                ->searchable(),
        ])
            ->filters([
                //
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageLogs::route('/'),
        ];
    }    
}

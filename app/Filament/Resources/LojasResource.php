<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Lojas;
use App\Models\Marcas;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use App\Filament\Resources\LojasResource\Pages;

class LojasResource extends Resource
{
    protected static ?string $model = Lojas::class;
    protected static ?string $modelMarca = Marcas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nome')
                ->required()
                ->unique(ignoreRecord: true)
                ->minLength(5)
                ->maxLength(100),

            Select::make('marca')
                ->label('Marca')
                ->options(Marcas::all()->pluck('nome', 'nome'))
                ->native(false)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('nome')
                ->searchable(),
            Tables\Columns\TextColumn::make('marca')
                ->searchable(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageLojas::route('/'),
        ];
    }    
}

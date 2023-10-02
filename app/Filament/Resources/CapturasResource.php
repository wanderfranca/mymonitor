<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Lojas;
use App\Models\Marcas;
use App\Models\Capturas;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use App\Filament\Resources\CapturasResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class CapturasResource extends Resource
{
    protected static ?string $model = Capturas::class;
    protected static ?string $modelLoja = Lojas::class;
    protected static ?string $modelMarca = Marcas::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
         return $form
        ->schema([

            Select::make('loja')
                ->label('Qual loja deseja monitorar?')
                ->options(Lojas::all()->pluck('nome', 'nome'))
                ->native(false)
                ->required()
                ->searchable(),

            Select::make('marca')
                ->label('Marca')
                ->options(Marcas::all()->pluck('nome', 'nome'))
                ->native(false),

            Select::make('tipohost')
                ->label('Tipo de Host')
                ->native(false)
                ->options([
                    'Totem' => 'Totem',
                    'Servidor' => 'Servidor',
                    'PDV' => 'PDV',
                    'Impressora' => 'Impressora',
                ]),

            Forms\Components\TextInput::make('host')
                ->required()
                ->minLength(5)
                ->maxLength(100),
        ]);
    }

   
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('id')
                ->searchable(),
            Tables\Columns\TextColumn::make('loja')
                ->searchable(),
            Tables\Columns\TextColumn::make('host')
                ->searchable(),
            Tables\Columns\TextColumn::make('ip')
                ->searchable(),
            Tables\Columns\TextColumn::make('down'),
            Tables\Columns\TextColumn::make('up'),
            Tables\Columns\TextColumn::make('datahora')
                ->label('Captura')
                ->dateTime('d-m-Y H:i:s')
                ->sortable(),
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
                    ExportBulkAction::make()
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
            'index' => Pages\ManageCapturas::route('/'),
        ];
    }    
}

<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Link;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use App\Filament\Resources\LinkResource\Pages;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LinkResource\RelationManagers;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;


class LinkResource extends Resource
{
    protected static ?string $model = Link::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    protected static ?int $navigationSort = 2;

    protected function getActions(): array{
        return [
            ImportAction::make()
                ->fields([
                    ImportField::make('user_id')
                        ->label('User id'),
                    ImportField::make('url')
                        ->label('Url'),
                    ImportField::make('slug')
                        ->label('Slug'),
                    ImportField::make('is_enabled')
                        ->label('Is enabled'),
                    ImportField::make('redirects')
                        ->label('Redirects'),
                    ImportField::make('created_at')
                        ->label('Created at'),
                    ImportField::make('updated_at')
                        ->label('Updated at'),
                ]),
            ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required(),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_enabled')
                    ->required(),
               /*
                Forms\Components\TextInput::make('redirects')
                    ->required(),
               */
                
            ]);
    }

    public static function table(Table $table): Table
    {
        if(config('easyshortener.enable_analytics') == "true"){
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')->searchable(),
                Tables\Columns\TextColumn::make('url')->searchable(),
                Tables\Columns\TextColumn::make('slug')->searchable()->sortable(),
                Tables\Columns\IconColumn::make('is_enabled')
                    ->boolean(),
                Tables\Columns\TextColumn::make('redirects'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                TernaryFilter::make('is_enabled'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('export')
                    ->fileName('export') // Default file name
                    ->defaultFormat('csv') // xlsx, csv or pdf
                    ->directDownload() // Download directly without showing modal
                    ->disableAdditionalColumns() // Disable additional columns input
                    ->disableFilterColumns() // Disable filter columns input
                    ->disableFileName() // Disable file name input
                    ->disableFileNamePrefix() // Disable file name prefix
                    ->disablePreview() // Disable export preview
                    ->withHiddenColumns() //Show the columns which are toggled hidden
                    ->csvDelimiter(',') // Delimiter for csv files
            ]);
            
        }else{
            return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('url')->searchable(),
                Tables\Columns\TextColumn::make('slug')->searchable()->sortable(),
                Tables\Columns\IconColumn::make('is_enabled')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                TernaryFilter::make('is_enabled'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('export')
                    ->fileName('export') // Default file name
                    ->defaultFormat('csv') // xlsx, csv or pdf
                    ->directDownload() // Download directly without showing modal
                    ->disableAdditionalColumns() // Disable additional columns input
                    ->disableFilterColumns() // Disable filter columns input
                    ->disableFileName() // Disable file name input
                    ->disableFileNamePrefix() // Disable file name prefix
                    ->disablePreview() // Disable export preview
                    ->withHiddenColumns() //Show the columns which are toggled hidden
                    ->csvDelimiter(',') // Delimiter for csv files
                
            ]);
        }
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageLinks::route('/'),
        ];
    }    
}

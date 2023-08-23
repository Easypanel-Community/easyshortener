<?php

namespace App\Filament\Resources\LinkResource\Pages;

use App\Filament\Resources\LinkResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;

class ManageLinks extends ManageRecords
{
    protected static string $resource = LinkResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
			ImportAction::make()
            ->fields([
                ImportField::make('user_id')
                    ->label('User IDs')
                    ->required(),
		    ImportField::make('url')
			  ->label('URLs')
                    ->required(),
                ImportField::make('slug')
                    ->label('Slugs')
                    ->required(),
                ImportField::make('is_enabled')
			  ->label('Is Enabled?')
                    ->helperText('Is link enabled?')
                    ->required()
                    ->mutateBeforeCreate(function (string $value): bool {
                        if ($value === '1') {
                            return true;
                        }

                        return false;
                    }),
                ImportField::make('redirects')
			  ->label('Redirects')
                    ->required(),
		    ImportField::make('created_at')
			  ->label('Search created At')
			  ->helperText('Link Creation Date')
                    ->required(),
                ImportField::make('updated_at')
                    ->required()
                    ->label('Search updated at')
			   ->helperText('Link Updated Date'),
            ])
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources\YachtResource\Pages;

use App\Filament\Admin\Resources\YachtResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditYacht extends EditRecord
{
    protected static string $resource = YachtResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

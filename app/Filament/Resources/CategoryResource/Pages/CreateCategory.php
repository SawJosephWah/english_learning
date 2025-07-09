<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use Filament\Actions;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\CategoryResource;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $userId = Auth::id();
        $data['created_by'] = $userId;
        $data['updated_by'] = $userId;

        $maxSort = Category::max('sort_order');
        $data['sort_order'] = $maxSort ? $maxSort + 1 : 1;
        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = Auth::id();
        return $data;
    }
}

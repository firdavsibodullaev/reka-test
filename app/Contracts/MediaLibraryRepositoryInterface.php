<?php

namespace App\Contracts;

use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

interface MediaLibraryRepositoryInterface
{
    public function addMedia(HasMedia $model, UploadedFile $file): Media;

    public function deleteMedia(HasMedia $model): bool;
}

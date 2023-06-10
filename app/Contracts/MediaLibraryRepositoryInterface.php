<?php

namespace App\Contracts;

use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

interface MediaLibraryRepositoryInterface
{
    public function addMedia(HasMedia $model, UploadedFile $file, string $collection = 'default'):Media;
}

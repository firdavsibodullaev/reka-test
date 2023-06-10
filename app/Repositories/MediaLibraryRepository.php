<?php

namespace App\Repositories;

use App\Contracts\MediaLibraryRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaLibraryRepository implements MediaLibraryRepositoryInterface
{
    public function addMedia(HasMedia $model, UploadedFile $file, string $collection = 'default'): Media
    {
        return $model->addMedia($file)->toMediaCollection($collection);
    }
}

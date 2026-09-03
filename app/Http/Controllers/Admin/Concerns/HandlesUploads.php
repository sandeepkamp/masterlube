<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HandlesUploads
{
    protected function storeImage(UploadedFile $file, string $directory): string
    {
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        return $file->storeAs($directory, $filename, 'public');
    }

    /**
     * Store a new image and delete the previous one, if any.
     */
    protected function replaceImage(?UploadedFile $file, string $directory, ?string $existingPath): ?string
    {
        if (! $file) {
            return $existingPath;
        }

        $this->deleteImage($existingPath);

        return $this->storeImage($file, $directory);
    }

    protected function deleteImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}

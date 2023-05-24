<?php

namespace App\Traits\Models;

use Illuminate\Support\Facades\File;

trait HasThumbnail
{
    abstract protected function thumbnailDir(): string;

    public function makeThumbnailFrom(string $path, string $size, string $method = 'resize'): string
    {
        return route('storage.thumbnail', [
            'size' => $size,
            'dir' => $this->thumbnailDir(),
            'method' => $method,
            'file' => $path
//            'file' => $this->{$this->thumbnaiColumn()}
        ]);
    }


    protected function thumbnaiColumn(): string
    {
        return 'thumbnai';
    }
}

<?php

namespace App\Traits\Models;

use Illuminate\Support\Facades\File;

trait HasThumbnail
{
    abstract protected function thumbnailDir(): string;

    public function makeThumbnail(string $size, string $method = 'resize'): string
    {
//        dd(File::basename($this->{$this->thumbnaiColumn()}));

        return route('storage.thumbnail', [
            'size' => $size,
            'dir' => $this->thumbnailDir(),
            'method' => $method,
            'file' => $this->{$this->thumbnaiColumn()}
//            'file' => File::basename($this->{$this->thumbnaiColumn()})
        ]);
    }


    protected function thumbnaiColumn(): string
    {
        return 'thumbnai';
    }
}

<?php

namespace App\Http\Controllers\Site\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ThumbnailController extends Controller
{
    const CONFIG = [
        'allowed_sizes' => [
            '800x800',
            '160x160',
        ]
    ];


    public function store(string $dir, string $method, string $size, string $file): BinaryFileResponse
    {
        abort_if(!in_array($size, self::CONFIG['allowed_sizes']), 403, 'Не указан размер изображения');

        $storage_thumbnails = Storage::disk('thumbnail');
        $storage_public = Storage::disk('public');

        $real_path = $storage_public->path($file);
        $new_dir_path = "$dir/$method/$size";
        $result_path = "$new_dir_path/" . File::basename($file);

        if (!$storage_thumbnails->exists($new_dir_path)) {
            $storage_thumbnails->makeDirectory($new_dir_path);
        }

        if (!$storage_thumbnails->exists($result_path)) {
            $image = Image::make($real_path);

            [$w, $h] = explode('x', $size);

            $image->{$method}($w, $h);
            $image->save($storage_thumbnails->path($result_path));
        }

        return response()->file($storage_thumbnails->path($result_path));
    }
}

<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public static function store($file, $data)
    {
        $ext = $file->getClientOriginalExtension();
        if (in_array($ext, self::$allowedExt)) {
            $name = 'product_id_' . $data->id . '.' . $ext;
            $output = 'public/image_product';

            $path = Storage::putFileAs($output, $file, $name);
            $url = $output . '/' . $name;
            return $url;
        }

        throw new \InvalidArgumentException('Invalid file extension');
    }

    static public $allowedExt = [
        "png", "jpeg", "jpg",
        "webp", "gif", "svg",
        "heic", "bmp", "eps",
        "dwg", "pdf",
    ];
}

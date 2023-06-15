<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageService
{
    public static function store($file, $data)
    {
        $ext = $file->getClientOriginalExtension();
        if (in_array($ext, self::$allowed_ext)) {
            $name = 'product_id_' . $data->id . '.' . $ext;
            $output = 'public/image_product';

            $path = Storage::putFileAs($output, $file, $name);
            $url = $output . '/' . $name;
            return $url;
        }

        throw new \InvalidArgumentException('Invalid file extension');
    }

    public static function delete($path){
        $route = public_path($path);

        if (File::exists($route)) {
            File::delete($route);
            return true;
        }

        return false;
    }

    static public $allowed_ext = [
        "png", "jpeg", "jpg",
        "webp", "gif", "svg",
        "heic", "bmp", "eps",
        "dwg", "pdf",
    ];
}

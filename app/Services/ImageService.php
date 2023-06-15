<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageService
{
    // function for storing product image and return path
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

    // function to delete existing image to store updated image in case of product editing
    public static function delete($path){
        $route = storage_path('app/'. $path);

        if (File::exists($route)) {
            File::delete($route);
            return true;
        }

        return false;
    }

    // permitted extensions
    static public $allowed_ext = [
        "png", "jpeg", "jpg",
        "webp", "gif", "svg",
        "heic", "bmp", "eps",
        "dwg", "pdf",
    ];
}

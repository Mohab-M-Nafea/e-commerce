<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ImageTrait
{
    public function storeImage($request, $folder, $width = 600, $height = null, $imageFolder = null): ?string
    {
        if ($request->hasFile('image')) {
            $image = $request->image;

            $imageOriginalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

            $folder .= is_null($imageFolder) ? "/$imageOriginalName" : "/$imageFolder";

            $imageName = $image->hashName();


            $storageFolder = storage_path("app/public/$folder");

            if (!file_exists($storageFolder)) {
                mkdir($storageFolder, recursive: true);
            }

            Image::make($request->image)
                ->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save("$storageFolder/$imageName");

            return "$folder/$imageName";
        }

        return null;
    }

    public function deleteImage($image): bool
    {
        if (!is_null($image)) {
            return Storage::disk('Public')->delete($image);
        }

        return false;
    }

    public function updateImage($request, $image, $folder, $width = 600, $height = null)
    {
        if ($request->hasFile('image')) {
            $this->deleteImage($image);

            return $this->storeImage($request, $folder, $width, $height);
        }

        return $image;
    }

    public function getFullImagePath(string $path, string $image): string
    {
        return self::folder . "/$path/" . $this->getImageName($image);
    }

    public function getImageName(string $image): string
    {
        return substr($image, strrpos($image, "/") + 1);
    }
}

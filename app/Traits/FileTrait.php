<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileTrait
{
    public function deleteFolder($path, $disk = 'Public'): bool
    {
        return Storage::disk($disk)
            ->deleteDirectory(self::folder . "/$path");
    }

    public function renameFolder($from, $to, $disk = 'Public'): bool
    {
        if ($from !== $to){
            return Storage::disk($disk)
                ->move($this->getFullPath($from), $this->getFullPath($to));
        }

        return false;
    }

    protected function getFullPath(string $path): string
    {
        return self::folder . DIRECTORY_SEPARATOR . $path;
    }
}

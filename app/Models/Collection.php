<?php

namespace App\Models;

use App\Traits\ApiTrait;
use App\Traits\FileTrait;
use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Collection extends Model
{
//    use HasFactory;
    use ImageTrait, ApiTrait, FileTrait;

    const folder = 'collections';

    protected $guarded = [];

//    public function findCollection(string $id, $select = ['*']): Collection
//    {
//        $collection = $this
//            ->select($select)
//            ->find($id);
//
//        if (is_null($collection)) {
//            $this->errorResponse("Collection Not Found");
//        }
//
//        return $collection;
//    }

    public function updateImagePath(string $from, string $to): bool
    {
        if ($from !== $to && !is_null($this->image)){
            return $this->update([
                'image' => $this->getFullImagePath($to, $this->image)
            ]);
        }

        return false;
    }


    public function url(): Attribute
    {
        return Attribute::make(
            get: fn($value) => [
                "base" => config('app.url') . "/collections/",
                "handler" => $value
            ],
            set: fn($value) => strtolower($value),
        );
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}

<?php

namespace App\Models;

use App\Traits\ApiTrait;
use App\Traits\FileTrait;
use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
//    use HasFactory;
    use ImageTrait, ApiTrait, FileTrait;

    const folder = 'products';

    protected $guarded = [];

    public function updateImagePath(string $from, string $to): bool
    {
        if ($from !== $to){
            foreach ($this->productImages as $image){
                $image->update([
                    'image' => $this->getFullImagePath($to, $image->image)
                ]);
            }

            return true;
        }

        return false;
    }

    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class);
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productOptions(): HasMany
    {
        return $this->hasMany(ProductOption::class);
    }

    public function productSpecifications(): HasMany
    {
        return $this->hasMany(ProductSpecification::class);
    }
}

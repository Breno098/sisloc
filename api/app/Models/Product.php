<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;

/**
 * @property int|null $id
 * @property string $name
 * @property string|null $description
 * @property float $daily_price
 * @property float $weekly_price
 * @property float $fortnightly_price
 * @property float $monthly_price
 * @property HasMany|Collection<ProductImage> $images
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Product extends Model
{
    use HasFactory;

     /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'daily_price',
        'weekly_price',
        'fortnightly_price',
        'monthly_price',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'daily_price' => 'float',
        'weekly_price' => 'float',
        'fortnightly_price' => 'float',
        'monthly_price' => 'float',
    ];

    /**
     * Relationships
     */

    /**
     * @return HasMany|Collection<ProductImage>
     */
    public function images(): HasMany|Collection
    {
        return $this->hasMany(ProductImage::class);
    }
}

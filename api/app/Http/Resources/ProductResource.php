<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Resources\Json\JsonResource;


class ProductResource extends JsonResource
{
    public static $wrap = null;
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var Product */
        $product = $this->resource;

        return [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'daily_price'=> $product->daily_price,
            'weekly_price'=> $product->weekly_price,
            'fortnightly_price'=> $product->fortnightly_price,
            'monthly_price'=> $product->monthly_price,
            'images' => $product->images->map(function(ProductImage $image) {
                return [
                    'title' => $image->title,
                    'path' => $image->path,
                ];
            }),
        ];
    }
}
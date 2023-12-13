<?php

namespace App\Http\Controllers;

use App\Helpers\Http\DataQuery;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     /**
     * @param ProductService $productService
     */
    public function __construct(
        protected readonly ProductService $productService,
    ) {}

    /**
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $products = $this->productService->index(
            $request->only(['name']),
        );

        return response()->json([
            'request' => $request->all(),
            'products' => $products->map(function(Product $product) {
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
            })
        ]);
    }

     /**
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product): JsonResponse
    {
        return response()->json([
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
        ]);
    }
}

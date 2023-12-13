<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
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
            'products' => ProductResource::collection($products)
        ]);
    }

     /**
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }
}

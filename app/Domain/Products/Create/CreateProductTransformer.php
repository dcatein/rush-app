<?php

namespace App\Domain\Products\Create;

use App\Domain\Products\Product;
use Illuminate\Http\JsonResponse;

class CreateProductTransformer
{
    public static function transform(Product $product): JsonResponse
    {
        $response = [
            'name' => $product->getName(),
            'value' => $product->getValue()
        ];

        return new JsonResponse($response);
    }
}

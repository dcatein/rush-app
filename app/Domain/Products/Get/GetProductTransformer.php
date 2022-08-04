<?php

namespace App\Domain\Products\Get;

use Illuminate\Http\JsonResponse;

class GetProductTransformer
{
    public static function transform(array $products): JsonResponse
    {
        $response = [];

        foreach ($products as $product){
            $response[] = [
                "id" => $product['id'],
                "name" => $product['name'],
                "value" => $product['value']
            ];
        }

        return new JsonResponse($response);
    }
}

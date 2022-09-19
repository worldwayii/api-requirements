<?php

namespace App\Domain\Product\Resource;

use App\Domain\Product\Model\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends  JsonResource
{
    public function toArray($request) {
        return [
            'sku' => $this->sku,
            'name' =>  $this->name,
            'category' => $this->category,
            'price' => [
                'original' =>  $this->price,
                'final' => Product::getDiscount($this->id) ? : $this->price,
                'discount_percentage' => Product::getPercentage($this->id),
                'currency' => 'EUR',
            ]

        ];
    }

}

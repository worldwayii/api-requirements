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
                'final' => $this->getDiscount() ? : $this->price,
                'discount_percentage' => $this->getPercentage(),
                'currency' => 'EUR',
            ]

        ];
    }

    private function getDiscount()
    {
        return Product::getDiscount($this->id);
    }

    private function getPercentage()
    {
        return Product::getPercentage($this->id);
    }
}

<?php

namespace App\Domain\Product\Resource;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResourceCollection extends ResourceCollection
{
    public function toArray($request) {

        return parent::toArray($request);
    }
}

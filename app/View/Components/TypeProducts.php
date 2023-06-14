<?php

namespace App\View\Components;

use App\Services\RepositoryService\ProductService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TypeProducts extends Component
{
    public function __construct(protected $title,protected $productType, protected ProductService $productService)
    {
        //
    }

    public function render(): View|Closure|string
    {
        $products=$this->productService->getProductsByType($this->productType);
        $title=$this->title;
//        dd($products);
        return view('components.type-products',compact('title','products'));
    }
}

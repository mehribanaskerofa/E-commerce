<?php

namespace App\View\Components;

use App\Services\RepositoryService\ProductService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedProducts extends Component
{
    public function __construct(protected $title,protected $productType, protected ProductService $productService)
    {
        //
    }

    public function render(): View|Closure|string
    {
        $products=$this->productService->getProductsByType($this->productType);
        dd($products);
        $title=$this->title;
        return view('components.front.featured-products',compact('title','products'));
    }
}

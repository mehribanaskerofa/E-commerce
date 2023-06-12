<?php

namespace App\View\Components;

use App\Services\RepositoryService\AttributeService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Attribute extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(protected $products,protected AttributeService $attributeService)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $attributesAll=$this->attributeService->dataAllWithoutPaginate();
        $attributeValues=array_unique($this->products->pluck('attributeValues.*.id')->flatten()->toArray());
        $attributes=$attributesAll->whereIn('id',$attributeValues);
        dd($attributes);
        return view('components.front.attribute',compact('attributes'));
    }
}

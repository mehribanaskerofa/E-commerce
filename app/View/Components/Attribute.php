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
//        dd($this->products->pluck('attributeValues')->flatten()->toArray());
//        $attributeValues=array_unique($this->products->pluck('attributeValues')->flatten()->toArray());
//        $attributes=$attributesAll->whereIn('id',$attributeValues);
        return view('components.attribute',['Attributes'=>$attributesAll]);
    }
}

<?php

namespace App\View\Components;

use App\Services\RepositoryService\ServiceService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Service extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(protected ServiceService $serviceService)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $services=$this->serviceService->CachedServices();
        return view('components.service',compact('services'));
    }
}

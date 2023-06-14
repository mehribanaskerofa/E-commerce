<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Services\RepositoryService\ServiceService;


class ServiceController extends Controller
{

    public function __construct(protected ServiceService $service)
    {

    }

    public function index()
    {
        $models=$this->service->dataAll();
        return view('admin.service.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.service.form');
    }
    public function store(ServiceRequest $request)
    {

        $this->service->store($request);
        return redirect()->route('admin.service.index');
    }
    public function edit(Service $service)
    {
        return view('admin.banner.form',['model'=>$service]);
    }
    public function update(ServiceRequest $serviceRequest,Service $service)
    {
        $this->service->update($serviceRequest,$service);
        return redirect()->back();
    }
    public function destroy(Service $service)
    {
        $this->service->delete($service);
        return redirect()->back();
    }
}

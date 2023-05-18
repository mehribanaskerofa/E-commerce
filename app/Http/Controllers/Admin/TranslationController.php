<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TranslationRequest;
use App\Models\Translation;
use App\Services\RepositoryService\TranslationService;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function __construct(protected TranslationService $translationService)
    {

    }

    public function index()
    {
        $models=$this->translationService->dataAllWithPaginate();
        //,compact($models)
        return view('admin.translation.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.translation.form');
    }
    public function store(TranslationRequest $request)
    {
        $this->translationService->store($request->all());
        return redirect()->route('admin.translation.index');
    }
    public function edit(Translation $translation)
    {
        return view('admin.translation.form',['models'=>$translation]);
    }
    public function update(Translation $translation)
    {
        $this->translationService->update(request(),$translation);
        return redirect()->back();
    }
    public function destroy(Translation $translation)
    {
        $this->translationService->delete($translation);
        return redirect()->back();
    }
}

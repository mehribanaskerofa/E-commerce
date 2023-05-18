<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function store()
    {

    }
    public function edit(Translation $translation)
    {

    }
    public function update(Translation $translation)
    {

    }
    public function destroy(Translation $translation)
    {

    }
}

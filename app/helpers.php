<?php

use App\Repositories\TranslationRepository;
use App\Services\RepositoryService\TranslationService;

function translate($key){
//    app()->setLocale('az');
//    (Translation::where('key',$key)->first())->value;
    $translations=(new TranslationService(new TranslationRepository()))->CachedTranslations();
    return $translations[$key] ?? $key;
}

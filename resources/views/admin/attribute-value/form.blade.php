@extends('admin.layouts.admin')


@section('content')
    {{ $routeName='admin.attribute-value'
}}
    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route($routeName.'.update',$model->id) :  route($routeName.'.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset

                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="pt-2 px-3"><h3 class="card-title">Title</h3></li>
                            @foreach(config('app.languages') as $langKey)
                                <li class="nav-item ">
                                    <a class="nav-link {{$loop->first ? ' active ' : '' }}
                                          @error("$langKey.title") text-danger @enderror"
                                       id="custom-tabs-two-home-tab" data-toggle="pill" href="#title-{{$langKey}}"
                                       role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">
                                        {{\Illuminate\Support\Str::upper($langKey)}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $lang)
                                <div class="tab-pane fade {{$loop->first ? ' active show' : '' }}" id="title-{{$lang}}"
                                     role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                    <div class="form-group">
                                        <label>Title {{$lang}}</label>
                                        <input type="text" placeholder="title {{$lang}}" name="{{$lang}}[title]"
                                               value="{{old("$lang.title",isset($model) ? ($model->translateOrDefault($lang)->title ?? '') : '')}}"
                                               class="form-control">
                                        @error("$lang.title")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Value</label>
                    <input type="text" placeholder="value" name="value"
                           value="{{old("value",isset($model) ? ($model->value ?? '') : '')}}"
                           class="form-control">
                    @error("value")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Active</label>
                    <input type="checkbox" name="active" value="1" @checked(old('active',$model->active ?? ''))>
                    @error('active')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <input name="attribute_id" value="{{$attributeId ?? $model->attribute_id}}" type="hidden">
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection


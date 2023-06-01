@extends('admin.layouts.admin')


@section('content')
    {{ $routeName='admin.product'
}}
    <?php  $rName='admin.product' ?>
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
                                    <div class="form-group">
                                        <label>Slug {{$lang}}</label>
                                        <input type="text" placeholder="Slug {{$lang}}" name="{{$lang}}[slug]"
                                               value="{{old("$lang.slug",isset($model) ? ($model->translateOrDefault($lang)->slug ?? '') : '')}}"
                                               class="form-control">
                                        @error("$lang.slug")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>description {{$lang}}</label>
                                        <input type="text" placeholder="Description {{$lang}}" name="{{$lang}}[description]"
                                               value="{{old("$lang.description",isset($model) ? ($model->translateOrDefault($lang)->description ?? '') : '')}}"
                                               class="form-control">
                                        @error("$lang.description")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Specification {{$lang}}</label>
                                        <input type="text" placeholder="Specification {{$lang}}" name="{{$lang}}[specification]"
                                               value="{{old("$lang.specification",isset($model) ? ($model->translateOrDefault($lang)->specification ?? '') : '')}}"
                                               class="form-control">
                                        @error("$lang.specification")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

{{--                <div class="card card-primary card-tabs">--}}
{{--                    <div class="card-header p-0 pt-1">--}}
{{--                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">--}}
{{--                            <li class="pt-2 px-3"><h3 class="card-title">Slug</h3></li>--}}
{{--                            @foreach(config('app.languages') as $langKey)--}}
{{--                                <li class="nav-item ">--}}
{{--                                    <a class="nav-link {{$loop->first ? ' active ' : '' }}--}}
{{--                                          @error("slug.$langKey") text-danger @enderror"--}}
{{--                                       id="custom-tabs-two-home-tab" data-toggle="pill" href="#slug-{{$langKey}}"--}}
{{--                                       role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">--}}
{{--                                        {{\Illuminate\Support\Str::upper($langKey)}}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="tab-content" id="custom-tabs-one-tabContent">--}}
{{--                            @foreach(config('app.languages') as $lang)--}}
{{--                                <div class="tab-pane fade {{$loop->first ? ' active show' : '' }}" id="slug-{{$lang}}"--}}
{{--                                     role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Slug {{$lang}}</label>--}}
{{--                                        <input type="text" placeholder="Slug {{$lang}}" name="{{$lang}}[slug]"--}}
{{--                                               value="{{old("$lang.slug",isset($model) ? ($model->translateOrDefault($lang)->slug ?? '') : '')}}"--}}
{{--                                               class="form-control">--}}
{{--                                        @error("$lang.slug")--}}
{{--                                        <span class="text-danger">{{$message}}</span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="card card-primary card-tabs">--}}
{{--                    <div class="card-header p-0 pt-1">--}}
{{--                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">--}}
{{--                            <li class="pt-2 px-3"><h3 class="card-title">Description</h3></li>--}}
{{--                            @foreach(config('app.languages') as $langKey)--}}
{{--                                <li class="nav-item ">--}}
{{--                                    <a class="nav-link {{$loop->first ? ' active ' : '' }}--}}
{{--                                          @error("description.$langKey") text-danger @enderror"--}}
{{--                                       id="custom-tabs-two-home-tab" data-toggle="pill" href="#description-{{$langKey}}"--}}
{{--                                       role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">--}}
{{--                                        {{\Illuminate\Support\Str::upper($langKey)}}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="tab-content" id="custom-tabs-one-tabContent">--}}
{{--                            @foreach(config('app.languages') as $lang)--}}
{{--                                <div class="tab-pane fade {{$loop->first ? ' active show' : '' }}" id="description-{{$lang}}"--}}
{{--                                     role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>description {{$lang}}</label>--}}
{{--                                        <input type="text" placeholder="Description {{$lang}}" name="{{$lang}}[description]"--}}
{{--                                               value="{{old("$lang.description",isset($model) ? ($model->translateOrDefault($lang)->description ?? '') : '')}}"--}}
{{--                                               class="form-control">--}}
{{--                                        @error("$lang.description")--}}
{{--                                        <span class="text-danger">{{$message}}</span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="card card-primary card-tabs">--}}
{{--                    <div class="card-header p-0 pt-1">--}}
{{--                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">--}}
{{--                            <li class="pt-2 px-3"><h3 class="card-title">Specification</h3></li>--}}
{{--                            @foreach(config('app.languages') as $langKey)--}}
{{--                                <li class="nav-item ">--}}
{{--                                    <a class="nav-link {{$loop->first ? ' active ' : '' }}--}}
{{--                                          @error("specification.$langKey") text-danger @enderror"--}}
{{--                                       id="custom-tabs-two-home-tab" data-toggle="pill" href="#specification-{{$langKey}}"--}}
{{--                                       role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">--}}
{{--                                        {{\Illuminate\Support\Str::upper($langKey)}}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="tab-content" id="custom-tabs-one-tabContent">--}}
{{--                            @foreach(config('app.languages') as $lang)--}}
{{--                                <div class="tab-pane fade {{$loop->first ? ' active show' : '' }}" id="specification-{{$lang}}"--}}
{{--                                     role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Specification {{$lang}}</label>--}}
{{--                                        <input type="text" placeholder="Specification {{$lang}}" name="{{$lang}}[specification]"--}}
{{--                                               value="{{old("$lang.specification",isset($model) ? ($model->translateOrDefault($lang)->specification ?? '') : '')}}"--}}
{{--                                               class="form-control">--}}
{{--                                        @error("$lang.specification")--}}
{{--                                        <span class="text-danger">{{$message}}</span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


                <div class="form-group">
                    <label>Price</label>
                    <input type="number" placeholder="Price" name="price"
                           value="{{old("price",isset($model) ? ($model->price ?? '') : '')}}"
                           class="form-control">
                    @error("price")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" placeholder="Quantity" name="quantity"
                           value="{{old("quantity",isset($model) ? ($model->quantity ?? '') : '')}}"
                           class="form-control">
                    @error("quantity")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control product-category">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                            @selected(old('category_id',(isset($model) ? $model->category_id : null))==$category->id)
                            >{{$category->title}}</option>
                        @endforeach

                    </select>
                    @error('parent_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div id="attributes-area">

                </div>

                <div class="form-group">
                    <label>Active</label>
                    <input type="checkbox" name="active" value="1" @checked(old('active',$model->active ?? ''))>
                    @error('active')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                @isset($model->image)
                    <div class="form-group">
                        {{--                <img src="{{{url('/storage/images/'.$page->image)}}}" width="100px">--}}
                        <img src="{{asset('storage/'.$model->image)}}" width="100px">
                    </div>
                @endisset
                <div class="form-group">
                    <label>Image</label>
                    <input type="file"  name="image" class="form-control">
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function (){
            getCategoryAttributes($('.product-category').trigger('change').val());
{{--            const $product_id={{@isset($model) ? $model->id : ''}};--}}
            $('.product-category').on('change',function (){
                getCategoryAttributes($(this).val());
            });

            function getCategoryAttributes($category_id){
                $.ajax({
                    method: 'get',
                    url: "{{route('admin.category-attributes',['categoryId','productId'])}}"
                        .replace('categoryId',$category_id)
                        .replace('productId',$('.product-category').val()),
                    success(response) {
                        $('#attributes-area').html(response);
                        $('#select2').select2();
                    }
                });
            }
        });
    </script>
@endpush

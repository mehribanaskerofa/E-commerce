<select name="cars" id="cars">
    <option value="volvo">{{app()->getLocale()}}</option>

    @foreach(config('app.languages') as $lang)
        @if($lang!= app()->getLOcale())
            <option value="{{$lang}}">{{$lang}}</option>
        @endif
    @endforeach
</select>

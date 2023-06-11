@foreach($attributes as $attribute)
    <div class="sidebar__{{$attribute->id}}">
        <div class="section-title">
            <h4>{{$attribute->title}}</h4>
        </div>
        <div class="{{$attribute->id}}__list" >
        color__list">
            @foreach($attribute->values as $value)
            <label for="{{$value->title}}">
                {{$value->title}}
                <input type="checkbox" id="{{$value->title}}">
                <span class="checkmark"></span>
            </label>
            @endforeach

        </div>
    </div>
@endforeach


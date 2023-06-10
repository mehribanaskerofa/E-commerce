<h3>Attributes</h3>
@foreach($attributes as $attribute)
    <div class="form-group" >
<label>Select {{$attribute->title}}</label>
<select name="attributes[{{$attribute->id}}][]" class="form-control select2 product-category" multiple>
    @foreach($attribute->values as $value)
           <option value="{{$value->id}}"
               @selected(in_array($value->id,$selectedAttributeValues))>
               {{$value->title}}
           </option>
    @endforeach

</select>

</div>
@endforeach

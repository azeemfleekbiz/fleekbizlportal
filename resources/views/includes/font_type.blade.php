<div class="form-group">
@foreach($font_tpe as $fontdata)
<div class="col-xs-3">
<img src="public/{{$fontdata->img_path}}">
<input type="checkbox" name="font_type[]" id="font_type1" class="form-control" value="{{$fontdata->id}}" />
</div>
@endforeach
<span class="error-message" style="display: none">Please check atleast one checkbox!</span>
</div>
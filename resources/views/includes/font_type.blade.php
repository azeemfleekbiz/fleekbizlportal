<div class="form-group">
@foreach($font_tpe as $fontdata)
<div class="col-xs-3">
<img src="public/{{$fontdata->img_path}}">
<input type="radio" name="font_type" id="font_type1" class="form-control" checked="checked" value="{{$fontdata->id}}" />
</div>
@endforeach
</div>
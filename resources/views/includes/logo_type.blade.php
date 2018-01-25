<div class="form-group">
@foreach($logo_type as $logodata)
<div class="col-xs-3">
<div class="titles">{{$logodata->title}}</div>    
<img src='public/{{$logodata->img_path}}'>
<input type="checkbox" name="logo_type[]" id="logo_type1" value="{{$logodata->id}}">
</div>
@endforeach		
</div>
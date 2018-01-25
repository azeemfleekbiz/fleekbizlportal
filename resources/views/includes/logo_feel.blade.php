<div class="form-group">
@foreach($logo_feel as $logodata)
<div class="col-xs-3">
<div class="titles">{{$logodata->title}}</div>    
<img src='public/{{$logodata->img_path}}'>
<input type="checkbox" name="logo_feel[]" id="logo_feel1" value="{{$logodata->id}}">
</div>
@endforeach		
</div>
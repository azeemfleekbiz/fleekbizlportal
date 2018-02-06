<div class="form-group">
@foreach($logo_usage as $logodata)
<div class="logo_use_box">
<input type="checkbox" name="logo_usage[]" id="logo_usage1" class="form-control" value="{{$logodata->id}}" />
<p>{{$logodata->title}} ({{strip_tags($logodata->descp)}})</p>
</div>

@endforeach	
<span class="error-message" style="display: none">Please check atleast one checkbox!</span>
</div>
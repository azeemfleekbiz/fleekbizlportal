<div class="form-group">
@foreach($logo_usage as $logodata)
<div>{{$logodata->title}} ({{strip_tags($logodata->descp)}})</div>
<input type="checkbox" name="logo_usage[]" id="logo_usage1" class="form-control" value="{{$logodata->id}}" />
@endforeach	
<span class="error-message" style="display: none">Please check atleast one checkbox!</span>
</div>
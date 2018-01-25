@foreach($logo_usage as $logodata)
<div class="form-group">
<label class="control-label">{{$logodata->title}} ({{strip_tags($logodata->descp)}})</label>
<input type="radio" name="logo_usage" id="logo_usage1" class="form-control" checked="checked" value="{{$logodata->id}}" />
</div>
@endforeach	
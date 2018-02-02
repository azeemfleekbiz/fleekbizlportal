<div class="form-group">
@foreach($logo_type as $logodata)
<div class="col-md-3 col-sm-6 col-xs-6 logo-sample_flow">
	<div class="logo-type-sec-col-1">
		<div class="logo-title titles">
			<p>
				{{$logodata->title}}
			</p>
		</div>    
		<div class="logo-thumbnail">
			<img src='public/{{$logodata->img_path}}'>
		</div>
		<input type="checkbox" name="logo_type[]" id="logo_type1" value="{{$logodata->id}}">
	</div>
</div>
@endforeach		
<span class="error-message" style="display:none;">Please check atleast one checkbox!</span>
</div>
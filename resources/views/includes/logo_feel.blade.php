<div class="form-group">
@foreach($logo_feel as $logodata)
<div class="col-md-3 col-sm-4 col-xs-6">
<div class="logo-type-sec-col-1">
		<div class="logo-title">
			<p>{{$logodata->title}}</p>
		</div>  
		<div class="logo-thumbnail">
			<img src='public/{{$logodata->img_path}}'>
		</div>
		<input type="checkbox" name="logo_feel[]" id="logo_feel1" value="{{$logodata->id}}">
	</div>
</div>
@endforeach		
<span class="error-message" style="display:none;">Please check atleast 1 and atmost 3 checkbox!</span>
</div>



		
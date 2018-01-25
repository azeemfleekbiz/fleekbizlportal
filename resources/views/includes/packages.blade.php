<div class="form-group">
@foreach($packages as $packagedata)
<div class="col-md-3 pricing-div pricing-div-1">
<p class="package-name">{{$packagedata->title}}</p>
<p class="old-price">${{$packagedata->regular_price}}</p>
<label class="new-price">$<span>{{$packagedata->sale_price}}</span></label>
{{strip_tags($packagedata->descp)}}
<a class="main-button main-button-white selectpackage" name="{{$packagedata->id}}" amount="{{$packagedata->sale_price}}">Get Started</a>
</div>
@endforeach
<input type="hidden" name="package_name" id="package_name" value="">
<input type="hidden" name="package_amount" id="package_amount" value="">
<input type="hidden" name="addon_name" id="addon_name" value="">
<input type="hidden" name="addon_amount" id="addon_amount" value="">
</div>
<div class="form-group">
<h3>Additional options</h3>  
@foreach($addon as $addondata)  
<div class="additional-left col-md-6">
<div class="addi-thumb">
<img src="public/{{$addondata->img_path}}" alt="">
</div>
<div class="addi-content">
<h5>{{$addondata->title}} - ${{$addondata->price}}</h5>
<p>{{strip_tags($addondata->descp)}}</p>
<a href="javascript:void(0);" class="add_adon" amount="{{$addondata->price}}" title="{{$addondata->id}}">Add</a>
</div>
</div>
@endforeach
</div> 
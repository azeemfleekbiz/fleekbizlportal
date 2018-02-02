<div class="pricing-section"><!--Pkg Section-->
	<div class="pricing-divs">
		<div class="form-group">
		@foreach($packages as $packagedata)
		<div class="col-md-4 pricing-div pricing-div-1">
		<p class="package-name">{{$packagedata->title}}</p>
		<p class="old-price">${{$packagedata->regular_price}}</p>
		<label class="new-price">$<span>{{$packagedata->sale_price}}</span></label>

		<div class="feature-list">
		{!!html_entity_decode($packagedata->descp)!!}
		</div>

		<a class="btn_btn_select_pack">
		<label class="selectpackage" name="{{$packagedata->id}}" for="chkbx{{$packagedata->id}}" amount="{{$packagedata->sale_price}}"><input type="checkbox" name="packageselect[]" id="chkbx{{$packagedata->id}}" style="opacity: 0;position: absolute;">Get Started</label>
		</a>
		<!-- <a class="main-button main-button-white selectpackage" name="{{$packagedata->id}}" amount="{{$packagedata->sale_price}}">Get Started</a> -->
		</div>
		@endforeach
		<span class="error-message" style="display: none">Please select atleast one package before place your order!</span>
		<input type="hidden" name="package_name" id="package_name" value="">
		<input type="hidden" name="package_amount" id="package_amount" value="">
		<input type="hidden" name="addon_name" id="addon_name" value="">
		<input type="hidden" name="addon_amount" id="addon_amount" value="">
		</div>
	</div>
</div><!--Pkg Section End-->



<div class="additional-options-row"> <!-- Addtional options row start here -->
	<div class="container">
	
	<div class="additi-option-title"> <!-- Additional title start here  -->
		<p>-   Additional options</p> 
	</div> <!-- Additional title end here  -->
	
	<div class="form-group">
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
	
	</div>
</div>	<!-- Addtional options row End here -->
	

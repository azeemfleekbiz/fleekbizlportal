@include('layout.head')
<div class="stepwizard">
<div class="stepwizard-row setup-panel">
<div class="stepwizard-step btn-primary">
<a href="#step-1" type="button" class="hidden navButton first">01</a>
<span class="btn btn-circle">01</span>
<p>Personal Details</p>
</div>
<div class="stepwizard-step">
<a href="#step-2" type="button" class="hidden navButton">02</a>
<span class="btn btn-circle">02</span>
<p>Project Brief</p>
</div>
<div class="stepwizard-step">
<a href="#step-3" type="button" class="hidden navButton">03</a>
<span class="btn btn-circle">03</span>
<p>Additional Details</p>
</div>
<div class="stepwizard-step">
<a href="#step-4" type="button" class="hidden navButton">04</a>
<span class="btn btn-circle">04</span>
<p>Pricing & Packages</p>
</div>
<div class="stepwizard-step">
<a href="#step-5" type="button" class="hidden navButton">05</a>
<span class="btn btn-circle">05</span>
<p>SECURE PAYMENT</p>
</div>
</div>
</div>
<form role="form" name="logoForm" id="logoForm" method="POST" action="{{ url('/create') }}">
	{{csrf_field()}}
<div class="row setup-content" id="step-1">
<div class="col-xs-12">
<div class="col-md-12">
<h3> Step 1</h3>
<div class="form-group">
<label class="control-label">First Name</label>
<input  type="text" name="fname" id="fname" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Last Name</label>
<input type="text" name="lname" id="lname" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Email</label>
<input type="text" name="email" id="email" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Phone Number</label>
<input type="text" name="phone" id="phone" required="required" class="form-control" />
</div>
<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
</div>
</div>
</div>
<div class="row setup-content" id="step-2">
<div class="col-xs-12">
<div class="col-md-12">
<h3> LOGO DETAILS</h3>
<div class="form-group">
<label class="control-label">Logo Name</label>
<input type="text" name="logo_name" id="logo_name" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Category</label>
<input type="text" name="logo_category" id="logo_category" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Target Audience</label>
<input type="text" name="target_audience" id="target_audience" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Competitors URLs</label>
<input type="text" name="compititor_url" id="compititor_url" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Slogan</label>
<input type="text" name="slogan" id="slogan" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Website</label>
<input type="text" name="website_url" id="website_url" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Description</label>
<input type="text" name="descrp" id="descrp" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Sample Logos</label>
<input type="text" name="sample_logos" id="sample_logos" required="required" class="form-control" />
</div>
<h3> visual representation</h3>
<div class="form-group">
<label class="control-label">Describe images you LIKE to represent your business</label>
<textarea name="describe_imgs_like" id="describe_imgs_like" cols="50" rows="10" required="required"></textarea>
</div>
<div class="form-group">
<label class="control-label">Describe images you DON'T LIKE to represent your business</label>
<textarea name="describe_imgs_dont_like" id="describe_imgs_dont_like" cols="50" rows="10" required="required"></textarea>
</div>
<h3>Logo type</h3>
<div class="form-group">
<div class="col-xs-3">
<div class="titles">Wordmark</div>    
<img src="{{ asset('images/order2-logo1.png')}}">
</div>    
<div class="col-xs-3">
<div class="titles">Lettermark</div>    
<img src="{{ asset('images/order2-logo2.png')}}">
</div> 
<div class="col-xs-3">
<div class="titles">Combination Mark</div>    
<img src="{{ asset('images/order2-logo3.png')}}">
</div> 
<div class="col-xs-3">
<div class="titles">iconic / abstract</div>    
<img src="{{ asset('images/order2-logo4.png')}}">
</div> 
<div class="col-xs-3">
<div class="titles">Emblem</div>    
<img src="{{ asset('images/order2-logo5.png')}}">
</div> 
<div class="col-xs-3">
<div class="titles">vintage</div>    
<img src="{{ asset('images/order2-logo6.png')}}">
</div> 
<div class="col-xs-3">
<div class="titles">Fun</div>    
<img src="{{ asset('images/order2-logo7.png')}}">
</div> 
<div class="col-xs-3">
<div class="titles">mascot</div>    
<img src="{{ asset('images/order2-logo8.png')}}">
</div> 
</div>
<h3>COLORS</h3>
<div class="form-group">
<label class="control-label">Color</label>
<input type="text" name="choose_color" id="choose_color" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Mention Your Specific Color (If any)</label>
<input type="text" name="other_color" id="other_color" class="form-control" />
</div>
<h3>Logo usage</h3>
<div class="form-group">
<label class="control-label">Print (Cards, Letterheads, Brochures etc)</label>
<input type="radio" name="logo_usage" id="logo_usage1" class="form-control" checked="checked" />
</div>
<div class="form-group">
<label class="control-label">Online (Website, Online advertising,banner ads etc)</label>
<input type="radio" name="logo_usage" id="logo_usage2" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Merchandise (Pens, Mugs, Bags etc)</label>
<input type="radio" name="logo_usage" id="logo_usage3" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Signs (Including shops, Billboards etc)</label>
<input type="radio" name="logo_usage" id="logo_usage4" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Television/Screen (Commercials,infomercials etc)</label>
<input type="radio" name="logo_usage" id="logo_usage5" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Clothing (T-shirts, Hats, Embroidery etc)</label>
<input type="radio" name="logo_usage" id="logo_usage6" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Mention Your Specific Color (If any)</label>
<input type="text" name="other_logo_usage" id="other_logo_usage" class="form-control" />
</div>
<h3>FONT type</h3>
<div class="form-group">
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font1.jpg')}}">
<input type="radio" name="font_type" id="font_type1" class="form-control" checked="checked" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font2.jpg')}}">
<input type="radio" name="font_type" id="font_type2" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font3.jpg')}}">
<input type="radio" name="font_type" id="font_type3" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font4.jpg')}}">
<input type="radio" name="font_type" id="font_type4" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font5.jpg')}}">
<input type="radio" name="font_type" id="font_type5" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font6.jpg')}}">
<input type="radio" name="font_type" id="font_type6" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font7.jpg')}}">
<input type="radio" name="font_type" id="font_type7" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font8.jpg')}}">
<input type="radio" name="font_type" id="font_type8" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font9.jpg')}}">
<input type="radio" name="font_type" id="font_type9" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font10.jpg')}}">
<input type="radio" name="font_type" id="font_type10" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font11.jpg')}}">
<input type="radio" name="font_type" id="font_type11" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font12.jpg')}}">
<input type="radio" name="font_type" id="font_type12" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font13.jpg')}}">
<input type="radio" name="font_type" id="font_type13" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font14.jpg')}}">
<input type="radio" name="font_type" id="font_type14" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font15.jpg')}}">
<input type="radio" name="font_type" id="font_type15" class="form-control" />
</div> 
<div class="col-xs-3">
<img src="{{ asset('images/orderflow2-font16.jpg')}}">
<input type="radio" name="font_type" id="font_type16" class="form-control" />
</div> 
</div>
<div class="form-group">
<label class="control-label">Mention Your Specific Color (If any)</label>
<input type="text" name="other_font_type" id="other_font_type" class="form-control" />
</div>
<h3>Overall logo feel</h3>
<div class="form-group">
<div class="col-xs-3">
<div class="titles">Artistic</div>    
<img src="{{ asset('images/order2-logo9.png')}}">
</div>    
<div class="col-xs-3">
<div class="titles">Minimal</div>    
<img src="{{ asset('images/order2-logo10.png')}}">
</div> 
<div class="col-xs-3">
<div class="titles">Sophisticated</div>    
<img src="{{ asset('images/order2-logo11.png')}}">
</div> 
<div class="col-xs-3">
<div class="titles">Corporate</div>    
<img src="{{ asset('images/order2-logo12.png')}}">
</div> 
<div class="col-xs-3">
<div class="titles">Childish</div>    
<img src="{{ asset('images/order2-logo13.png')}}">
</div> 
<div class="col-xs-3">
<div class="titles">Web 2.0</div>    
<img src="{{ asset('images/order2-logo14.png')}}">
</div> 
<div class="col-xs-3">
<div class="titles">Fun</div>    
<img src="{{ asset('images/order2-logo15.png')}}">
</div> 
<div class="col-xs-3">
<div class="titles">Retro</div>    
<img src="{{ asset('images/order2-logo16.png')}}">
</div> 
</div>
<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
<button class="btn btn-primary prevBtn btn-lg pull-left" type="button" >Previous</button>
</div>
</div>
</div>
<div class="row setup-content" id="step-3">
<div class="col-xs-12">
<div class="col-md-12">
<h3>Upload If you have any files, images, sketches, or other documents</h3>
<div class="form-group">
<label class="control-label">Is there anything else you would like to communicate to our logo design team?</label>
<textarea name="communicate_designers" id="communicate_designers" cols="50" rows="10"></textarea>
</div>
<div class="form-group">
<label class="control-label">Do you have any other images or documents that might be helpful to our designers?</label>
<input type="file" name="deigner_help_imgs" id="deigner_help_imgs" class="form-control" />
</div>
<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
<button class="btn btn-primary prevBtn btn-lg pull-left" type="button" >Previous</button>
</div>
</div>
</div>
<div class="row setup-content" id="step-4">
<div class="col-xs-12">
<div class="col-md-12">
<h3>All of our packages include our fantastic customer service and a dedicated project manager</h3>
<div class="form-group">

<div class="col-md-3 pricing-div pricing-div-1">
<p class="package-name">Logo Basic</p>
<p class="old-price">$99</p>
<label class="new-price">$<span>79</span></label>
<ul class="feature-list">
<li class="first">6 Unique Logo Concepts</li>
<li>Free Icon</li>
<li>Unlimited Revisions</li>
<li>100% Ownership Rights</li>
<li>AI, PSD, EPS, GIF, BMP, JPEG</li>
<li>All Formats</li>
<li>Free Rush Delivery</li>
<li>Get Initial Concepts within 24</li>
<li><span>FREE</span> Stationery Design</li>
<li class="last"><span>FREE</span> Stationery Printing</li>
</ul>
<a class="main-button main-button-white active">Get Started</a>
</div>

<div class="col-md-3 pricing-div pricing-div-2 active">
<p class="package-name">Logo Plus</p>
<p class="old-price">$199</p>
<label class="new-price">$<span>179</span></label>
<ul class="feature-list">
<li class="first">12 Unique Logo Concepts</li>
<li>Free Icon</li>
<li>Unlimited Revisions</li>
<li>100% Ownership Rights</li>
<li>AI, PSD, EPS, GIF, BMP, JPEG</li>
<li>PNG All All Formats</li>
<li>Free Rush Delivery</li>
<li>Get Initial Concepts within 24</li>
<li><span>FREE</span> Stationery Design</li>
<li class="last"><span>FREE</span> Stationery Printing</li>
</ul>
<a class="main-button main-button-white">Get Started</a>
</div>


<div class="col-md-3 pricing-div pricing-div-3">
<p class="package-name">Logo Infinity</p>
<p class="old-price">$499</p>
<label class="new-price">$<span>359</span></label>
<ul class="feature-list">
<li class="first">Infinite Logo Concepts</li>
<li>Free Icon</li>
<li>Unlimited Revisions</li>
<li>100% Ownership Rights</li>
<li>AI, PSD, EPS, GIF, BMP, JPEG</li>
<li>All Formats</li>
<li>Free Rush Delivery</li>
<li><span>FREE</span> Stationery Design</li>
<li><span>FREE</span> Stationery Printing</li>
<li class="last"><span>FREE</span> 500 Business Cards Prints</li>
</ul>
<a class="main-button main-button-white">Get Started</a>
</div>

<div class="col-md-3 pricing-div pricing-div-4">
<p class="package-name">Logo Advanced</p>
<p class="old-price">$599</p>
<label class="new-price">$<span>499</span></label>
<ul class="feature-list">
<li class="first">Infinite Logo Concepts</li>
<li>Free Icon</li>
<li>Unlimited Revisions</li>
<li>100% Ownership Rights</li>
<li>AI, PSD, EPS, GIF, BMP, JPEG</li>
<li>All Formats</li>
<li>Free Rush Delivery</li>
<li><span>FREE</span> Stationery Design</li>
<li><span>FREE</span> StationeryPrinting</li>
<li class="last"><span>FREE</span> 500 Business Cards Prints</li>
</ul>
<a class="main-button main-button-white">Get Started</a>
</div>

</div>
<div class="form-group">
<h3>Additional options</h3>    
<div class="additional-left col-md-6">
<div class="addi-thumb">
<img src="{{ asset('images/orderflow4-img1.png')}}" alt="">
</div>
<div class="addi-content">
<h5>Rush - $75</h5>
<p>If you’re in a hurry, rush the order and we’ll make sure you get your initial designs in just 2 business days!</p>
</div>
</div>
<div class="additional-left col-md-6">
<div class="addi-thumb">
<img src="{{ asset('images/addi-man-icon.png')}}" alt="">
</div>
<div class="addi-content">
<h5>Experts Only - $99</h5>
<p>If you’re in a hurry, rush the order and we’ll make sure you get your initial designs in just 2 business days!</p>
</div>
</div>
</div>    
<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
<button class="btn btn-primary prevBtn btn-lg pull-left" type="button" >Previous</button>
</div>
</div>
</div>
<div class="row setup-content" id="step-5">
<div class="col-xs-12">
<div class="col-md-12">
<h3>payment method</h3>
<div class="form-group">
<label class="control-label">ORDER SUMMARY</label>
<strong>Total = $340</strong>
</div>

<button class="btn btn-primary prevBtn btn-lg pull-left" type="button" >Previous</button>
<button class="btn btn-success btn-lg pull-right" type="submit">Place Order</button>
</div>
</div>
</div>
</form>
@include('layout.footer')
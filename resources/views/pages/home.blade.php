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
</div>
</div>
<form role="form" name="logoForm" id="logoForm" method="post" action="{{ url('/create') }}" enctype="multipart/form-data">
	{{csrf_field()}}
<input  type="hidden" name="user_role" id="user_role" value="3" />
<input  type="hidden" name="order_type" id="order_type" value="2" />	
<div class="row setup-content" id="step-1">
<div class="col-xs-12">
<div class="col-md-12">
<h3> Step 1</h3>
<div class="form-group">
<label class="control-label">First Name *</label>
<input  type="text" name="fname" id="fname" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Last Name *</label>
<input type="text" name="lname" id="lname" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Email *</label>
<input type="email" name="email" id="email" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Phone Number *</label>
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
<label class="control-label">Logo Name*</label>
<input type="text" name="logo_name" id="logo_name" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Category*</label>
<input type="text" name="logo_category" id="logo_category" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Target Audience</label>
<input type="text" name="target_audience" id="target_audience" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Competitors URLs</label>
<input type="text" name="compititor_url" id="compititor_url" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Slogan</label>
<input type="text" name="slogan" id="slogan" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Website</label>
<input type="url" name="website_url" id="website_url" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Description *</label>
<input type="text" name="descrp" id="descrp" required="required" class="form-control" />
</div>
<div class="form-group">
<label class="control-label">Sample Logos</label>
<input type="file" name="sample_logos[]" id="sample_logos" class="form-control user_picked_files" multiple="multiple"/>
<input type="hidden" name="sample_file_total" id="sample_file_total" value="">
<input type="hidden" name="uploadfiles_name" id="uploadfiles_name" value="">
<ul class = "cvf_uploaded_files"></ul>
</div>
<h3> visual representation</h3>
<div class="form-group">
<label class="control-label">Describe images you LIKE to represent your business</label>
<textarea name="describe_imgs_like" id="describe_imgs_like" cols="50" rows="10"></textarea>
</div>
<div class="form-group">
<label class="control-label">Describe images you DON'T LIKE to represent your business</label>
<textarea name="describe_imgs_dont_like" id="describe_imgs_dont_like" cols="50" rows="10"></textarea>
</div>
<h3>Logo type</h3>
@include('includes.logo_type');
<h3>COLORS</h3>
<div class="form-group">
<label class="control-label">Color *</label>
<input type="text" name="choose_color" id="choose_color" required="required" class="form-control jscolor" />
</div>
<div class="form-group">
<label class="control-label">Mention Your Specific Color (If any)</label>
<input type="text" name="other_color" id="other_color" class="form-control" />
</div>
<h3>Logo usage</h3>
@include('includes.logo_usage');
<h3>FONT type</h3>
@include('includes.font_type');
<div class="form-group">
<label class="control-label">Mention Your Specific Color (If any)</label>
<input type="text" name="other_font_type" id="other_font_type" class="form-control" />
</div>
<h3>Overall logo feel</h3>
@include('includes.logo_feel');
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
<input type="file" name="deigner_help_imgs[]" id="deigner_help_imgs" class="form-control user_help_files" multiple="multiple"/>
<input type="hidden" name="deigner_help_file_total" id="deigner_help_file_total" value="">
<input type="hidden" name="deigner_help_files_name" id="deigner_help_files_name" value="">
<ul class = "cvf_uploaded_help_files"></ul>
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
@include('includes.packages');   
<button class="btn btn-success btn-lg pull-right finish-btn" type="button" >Place Order</button>
<button class="btn btn-primary prevBtn btn-lg pull-left" type="button" >Previous</button>
</div>
</div>
</div>
</form>
@include('layout.footer')
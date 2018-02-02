@include('layout.head')



<div class="container">


<div class="stepwizard orderflow-1-steps">
<div class="stepwizard-row setup-panel">
<div class="stepwizard-step orderflow-steps btn-primary">
<a href="#step-1" type="button" class="hidden navButton first">01</a>
<h4>01</h4>
<p>Personal Details</p>
</div>
<div class="stepwizard-step orderflow-steps">
<a href="#step-2" type="button" class="hidden navButton">02</a>
<h4>02</h4>
<p>Project Brief</p>
</div>
<div class="stepwizard-step orderflow-steps">
<a href="#step-3" type="button" class="hidden navButton">03</a>
<h4>03</h4>
<p>Additional Details</p>
</div>
<div class="stepwizard-step orderflow-steps">
<a href="#step-4" type="button" class="hidden navButton">04</a>
<h4>04</h4>
<p>Pricing & Packages</p>
</div>

<div class="stepwizard-step orderflow-steps payments">
<a href="#step-5" type="button" class="hidden navButton">05</a>
<h4>05</h4>
<p>Secure & Payment</p>
</div>


</div>
</div>


<form role="form" name="logoForm" id="logoForm" method="post" action="{{ url('/create') }}" enctype="multipart/form-data">
	{{csrf_field()}}
<input  type="hidden" name="user_role" id="user_role" value="3" />
<input  type="hidden" name="order_type" id="order_type" value="2" />	


<div class="row setup-content" id="step-1"><!--Step 1-->



<div class="orderflow1-form-row">

	<div class="orderflow-title">
	<p>We’ll start by learning a bit more about you and your business</p>
	</div>

	<div class="ordeflow-form-row-1">
		<div class="col-md-6 col-sm-6 orderflow-form-field1">
			<div class="form-group">
				<p>
					<label class="control-label">First Name *</label>
				</p>
				<input  type="text" name="fname" id="fname" required="required" class="form-control" />
			</div>
		</div>
		<div class="col-md-6 col-sm-6 orderflow-form-field1">
			<div class="form-group">
				<p>
					<label class="control-label">Last Name *</label>
				</p>
				<input type="text" name="lname" id="lname" required="required" class="form-control" />
			</div>
		</div>
	</div>
	<div class="ordeflow-form-row-1">
		<div class="col-md-6 col-sm-6 orderflow-form-field1">
			<div class="form-group">
				<p>
					<label class="control-label">Email *</label>
				</p>
				<input type="email" name="email" id="email" required="required" class="form-control" />
			</div>
		</div>
		<div class="col-md-6 col-sm-6 orderflow-form-field1">
			<div class="form-group">
				<p>
				<label class="control-label">Phone Number *</label>
				</p>
				<input type="text" name="phone" id="phone" required="required" class="form-control" />
			</div>
		</div>
	</div>
</div>



<button class="btn btn-primary nextBtn btn-lg userdatasave btn_orderform" type="button" >Next</button>

</div><!--Step 1 End-->




<div class="row setup-content" id="step-2">

<div class="orderflow2-section-1">

<div class="orderflow-title">
<p>Start your project by filling out the creative brief for services in your package</p>
</div>



<div class="col-xs-12">
<div class="col-md-12">


<!-- LOGO DETAILS Section-->
<div class="logo-details-row">
	<div class="logo-detail-title"> <!-- Logo detail title start here -->
		<p>-   Logo DETAILS *</p>
	</div>
	
	
	<div class="logo-details-form">
	
		<div class="logo-detail-field-row-1">
			<div class="col-md-6 logo-detail-field1">
				<div class="form-group">
					<p>	
						<label class="control-label">Logo Name*</label>
						<br>
						<span>This name will be the <br>
						text of logo</span>
					</p>
					<input type="text" name="logo_name" id="logo_name" required="required" class="form-control" />
				</div>
			</div>
			<div class="col-md-6 logo-detail-field1">
				<div class="form-group">
					<p>	
						<label class="control-label">Slogan</label>
						<br>
						<span>To be used in your logo <br>
						(if any)</span>
					</p>
					<input type="text" name="slogan" id="slogan" class="form-control" />
				</div>
			</div>
		</div>
		
		<div class="logo-detail-field-row-1">
			<div class="col-md-6 logo-detail-field1">
				<div class="form-group">
					<p>	
						<label class="control-label">Category*</label>
						<br>
						<span>e.g. Fashion, Sports, <br>Real Estate</span>
					</p>
					<input type="text" name="logo_category" id="logo_category" required="required" class="form-control" />
				</div>
			</div>
			<div class="col-md-6 logo-detail-field1">
				<div class="form-group">
					<p>	
						<label class="control-label">Website</label>
						<br>
						<span>Provide your business <br>URL</span>
					</p>
					<input type="url" name="website_url" id="website_url" class="form-control" />
				</div>
			</div>
		</div>
		
		<div class="logo-detail-field-row-1">
			<div class="col-md-6 logo-detail-field1">
				<div class="form-group">
					<p>	
						<label class="control-label">Target Audience</label>
						<br>
						<span>Tell us what is your <br>target audience</span>
					</p>
					<input type="text" name="target_audience" id="target_audience" class="form-control" />
				</div>
			</div>
			<div class="col-md-6 logo-detail-field1">
				<div class="form-group">
					<p>	
						<label class="control-label">Competitors URLs</label>
						<br>
						<span>Tell us your competi-<br>tors name</span>
					</p>
					<input type="text" name="compititor_url" id="compititor_url" class="form-control" />
				</div>
			</div>
		</div>
		
		<div class="logo-detail-field-row-1">
			<div class="col-md-6 logo-detail-field1">
				<div class="form-group">
					<p>	
						<label class="control-label">Description *</label>
						<br>
						<span>Tell us about your <br>company</span>
					</p>
					<input type="text" name="descrp" id="descrp" required="required" class="form-control" />
				</div>
			</div>
			<div class="col-md-6 logo-detail-field1">
				<div class="form-group">
					<p>	
						<label class="control-label">Sample Logos</label>
						<br>
						<span>Share logos which you<br> like</span>
					</p>
					<input type="file" name="sample_logos[]" id="sample_logos" class="form-control user_picked_files" multiple="multiple"/>
					<input type="hidden" name="sample_file_total" id="sample_file_total" value="">
					<input type="hidden" name="uploadfiles_name" id="uploadfiles_name" value="">
					<ul class = "cvf_uploaded_files"></ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- LOGO DETAILS Section End-->

 <!-- visual row start here -->
<div class="visual-rep-row">

	<div class="visual-row-title">
		<p>-   visual representation *</p>
	</div>


<div class="visual-desc-fields col-md-12">
	<div class="visual-field1"> <!-- Visual field 1 start here -->
		<div class="form-group">
			<p>
				<label class="control-label">Describe images you
				LIKE to represent
				your business</label><br>
				<span>Example (You are a
				painter): I want a paintbrush in my logo</span>
			</p>
			<textarea name="describe_imgs_like" id="describe_imgs_like" cols="50" rows="10"></textarea>
		</div>
	</div>
	
	<div class="visual-field1"> <!-- Visual field 1 start here -->
		<div class="form-group">
			<p><label class="control-label">Describe images you
				DON'T LIKE to represent your business</label><br><span>Example (You are a<br> painter): I want a paint bucket in my logo</span>
			</p>
			<textarea name="describe_imgs_dont_like" id="describe_imgs_dont_like" cols="50" rows="10"></textarea>
		</div>
	</div>
	
</div>

</div>
<!-- visual row End here -->


<!--Logo Type-->
<div class="logo-type-row">

	<div class="logo-type-title"> <!-- Logo type title start here -->
		<p>-   Logo type  *</p>
	</div>
	
	
	@include('includes.logo_type')

</div>


<div class="colors-row"> <!-- Colors row start here -->


	<div class="colors-title"> <!-- colors title start here -->
	<p>-   COLORS  *</p>
	</div> <!-- colors title end here -->

	<div class="color-spec-row col-md-6 ">
		<div class="form-group ">
			<p><label class="control-label">Color *</label></p>
			<input type="text" name="choose_color" id="choose_color" required="required" class="form-control jscolor" />
		</div>
	</div>

	<div class="color-spec-row col-md-6"> <!-- Color spec row start here -->
		<div class="form-group">
			<p><label class="control-label">Mention Your Specific Color (If any)</label></p>
			<textarea name="other_color" id="other_color" class="form-control" ></textarea>
		</div>
	</div>

</div> <!-- Colors row End here -->


<div class="logo-usage-row">  <!-- Logo usage row start here -->

<div class="logo-usage-title"> <!-- Logo usage title start here -->
<p>-   Logo usage  *</p>
</div> <!-- Logo usage title end here -->

<div class="logo-usage-types">
	@include('includes.logo_usage')
</div>


</div><!-- Logo usage row End here -->



<div class="font-type-row"> <!-- Font type row start here -->


	<div class="font-type-title"> <!-- font type title start here -->
		<p>-   FONT type *</p> 
	</div> <!-- font type title end here -->

	<div class="font-type-logos">
			@include('includes.font_type')
	</div>
	
	<div class="form-group specify_fonts col-md-12">
		<p><label class="control-label">Mention Your Specific Fonts (If any)</label></p>
		<input type="text" name="other_font_type" id="other_font_type" class="form-control" />
	</div>

</div> <!-- Font type row End here -->

<div class="logo-type-row"> <!-- Logo Feel row start here -->


<div class="logo-type-title"> 
<p>-   Overall logo feel *</p>
</div>  

	<div class="logo-types-sel"> 
		@include('includes.logo_feel')
	</div>


</div><!-- Logo Feel row end here -->



<div class="col-md-12 step_2_buton">
<button class="btn btn-primary nextBtn btn-lg pull-right btn_orderform" type="button" >Next</button>
<button class="btn btn-primary prevBtn btn-lg pull-left btn_orderform" type="button" >Previous</button>
</div>


</div>
</div>
</div>
</div><!--Step 2 End-->



<div class="row setup-content" id="step-3"> <!-- Orderflow3 sec one start here -->





<div class="orderflow3-sec-one"> 
	<div class="orderflow-title">
		<p>Upload If you have any files, images, sketches, or other documents</p>
	</div>
	
	<div class="ordeflow3-fields">
		<div class="orderflow3-filed1 col-md-6">
			<div class="form-group">
				<p>
				<label class="control-label">Is there anything else you would like to communicate to our logo design team?</label>
				</p>
				<textarea name="communicate_designers" id="communicate_designers" cols="50" rows="10"></textarea>
			</div>
		</div>
		<div class="orderflow3-filed1 col-md-6">
			<div class="form-group">
				<p>
					<label class="control-label">Do you have any other images or documents that might be helpful to our designers?</label>
				</p>
				
				<div class="ul_for_file">
					<ul class = "cvf_uploaded_help_files"></ul>
					<div class="btn_for_file_up">
						<input type="file" name="deigner_help_imgs[]" id="deigner_help_imgs" class="form-control user_help_files" multiple="multiple"/>
						<input type="hidden" name="deigner_help_file_total" id="deigner_help_file_total" value="">
						<input type="hidden" name="deigner_help_files_name" id="deigner_help_files_name" value="">
					</div>
				</div>
			</div>
		</div>
	</div>


</div><!-- Orderflow3 sec one start here -->


<div class="btns_three_step">
	<div class="col-xs-12">
	<div class="col-md-12">
		<button class="btn btn-primary nextBtn btn-lg pull-right btn_orderform" type="button" >Next</button>
		<button class="btn btn-primary prevBtn btn-lg pull-left btn_orderform" type="button" >Previous</button>
	</div>
	</div>
</div>
</div> <!-- Orderflow3 sec one End  here -->




<div class="row setup-content" id="step-4">

<div class="orderflow4-pkgs-row"> <!-- Order flow4 pkgs row start here -->


	<p class="order_pkg_abv_p">
		All of our packages include our fantastic customer service and a dedicated project manager
	</p>

	@include('includes.packages')   
	
</div><!-- Order flow4 pkgs row End here -->


<div class="col-xs-12">
<div class="col-md-12">
<button class="btn btn-success btn-lg pull-right finish-btn btn_orderform " type="button" >Place Order</button>
<button class="btn btn-primary prevBtn btn-lg pull-left btn_orderform " type="button" >Previous</button>
</div>
</div>
</div>
</form>


	
</div><!--Container-->



<script type="text/javascript">
	$(document).on("click", ".userdatasave", function () { 
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var user_role = $('#user_role').val();
        var _token = $( "input[name*='_token']" ).val();

        if(fname != '' && lname != '' && email != '' && phone != ''){
                $.ajax({
                url: "userinfosave",
                data: {fname:fname,lname:lname,email:email,phone:phone,user_role:user_role,_token:_token},
                type: 'POST',
                beforeSend: function () {
                },
                success: function (result) {
                },
                error: function () {
                }
            });
        }

    }); 
	
	$(document).ready(function () {
		
		
    var ckbox = $('.logo-type-sec-col-1 input');
    $('.logo-type-sec-col-1 input').on('click',function () {
        if (ckbox.is(':checked')) {
            $(this).closest('.logo-type-sec-col-1').toggleClass('active');
        } else {
            
        }
    });
	
	var fontchk = $('.font-type-logo1 input');
    $('.font-type-logo1 input').on('click',function () {
        if (fontchk.is(':checked')) {
             $(this).closest('.font-type-logo1').toggleClass('active');
        } else {
            
        }
    });
	
	var logobox = $('.logo_use_box input');
    $('.logo_use_box input').on('click',function () {
        if (logobox.is(':checked')) {
             $(this).closest('.logo_use_box').toggleClass('active');
        } else {
            
        }
    });
	
	var pkg_select = $('.selectpackage input');
    $('.selectpackage input').on('click',function () {
		$('.btn_btn_select_pack').removeClass('selected');
        if (pkg_select.is(':checked')) {
			//alert('aded')
             $(this).closest('.btn_btn_select_pack').toggleClass('selected');
        } else {
            
        }
    });
	
	
	
	
	
	
	
	});	
	
	
	
	
	
</script>
@include('layout.footer')





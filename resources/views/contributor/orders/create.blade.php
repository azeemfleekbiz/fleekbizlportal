@extends('contributor.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
       Add New Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Add New Order</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<div class="box">
        @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
 <div class="clearfix" style="margin-top: 20px"></div>
 <div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p><small>Project Brief</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Additional Details</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>Pricing & Packages</small></p>
            </div>            
        </div>
    </div>
    
     <form role="form" method="POST" action="{{url('/contributor/orders/createorder')}}" enctype="multipart/form-data">
         {{ csrf_field() }}
         <input  type="hidden" name="order_type" id="order_type" value="2" />
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title">Logo Details</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Logo Name* </label>
                    <input type="text" required="required" name="logo_name" id="logo_name" class="form-control" placeholder="Enter Logo Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Category*</label>
                    <input type="text" required="required"  name="logo_category" id="logo_category" class="form-control" placeholder="Enter Category" />
                </div>
                
                <div class="form-group">
                    <label class="control-label">Target Audience</label>
                    <input type="text" name="target_audience" id="target_audience"  class="form-control" placeholder="Enter Target Audience" />
                </div>
                
                <div class="form-group">
                    <label class="control-label">Competitors URLs</label>
                    <input type="text"  name="compititor_url" id="compititor_url"  class="form-control" placeholder="Enter Competitors URLs" />
                </div>
                
                <div class="form-group">
                    <label class="control-label">Slogan</label>
                    <input type="text" name="slogan" id="slogan" class="form-control" placeholder="Enter Slogan" />
                </div>
                
                <div class="form-group">
                    <label class="control-label">Website</label>
                    <input type="text" name="website_url" id="website_url" class="form-control" placeholder="Enter your Website link" />
                </div>
                
                <div class="form-group">
                    <label class="control-label">Description*</label>
                    <input type="text" name="descrp" id="descrp"  class="form-control" required="required" placeholder="Enter Description" />
                </div>
               
                <div class="form-group">
                    <label class="control-label">Sample Logos</label>
                    <input type="file" name="sample_logos[]" id="sample_logos" class="form-control user_picked_files" multiple="multiple"/>
                    <input type="hidden" name="sample_file_total" id="sample_file_total" value="">
                    <input type="hidden" name="uploadfiles_name" id="uploadfiles_name" value="">
                <ul class = "cvf_uploaded_files"></ul>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Visual representation</label>
                    <br/>
                    <textarea name="describe_imgs_like" id="describe_imgs_like" cols="50" rows="10">                       
                    
                    </textarea>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Describe images you DON'T LIKE to represent your business</label>
                    <br/>
                    <textarea name="describe_imgs_dont_like" id="describe_imgs_dont_like" cols="50" rows="10">
                        
                    </textarea>
                </div>
                <div>
                <h3>Logo type</h3>
                <div class="form-group">
                @foreach($logo_types as $logodata)
               <div class="col-xs-3">
               <div class="titles">{{$logodata->title}}</div>    
               <img src="{{asset('/public/'.$logodata->img_path)}}" width="100px" height="70px">
               <input type="checkbox" name="logo_type[]" id="logo_type1" value="{{$logodata->id}}">                      
              </div>                 
               @endforeach		
               <span style="display:none" class="error-message">Please check atleast one checkbox!</span>
              </div>
          </div>
<div class="clear"></div>
                <div class="clearfix" style="height: 20px"></div>   
<div class="form-group">
          
<label class="control-label">Color *</label>
<input type="text" name="choose_color" id="choose_color" required="required" class="form-control" />
</div>
                
<div class="form-group">
<label class="control-label">Mention Your Specific Color (If any)</label>
<input type="text" name="other_color" id="other_color" class="form-control" />
</div>
                
                <h3>Logo usage</h3>
                
                <div class="form-group">
@foreach($logo_usage as $logodata)
<div>{{$logodata->title}} ({{strip_tags($logodata->descp)}})</div>
<input type="checkbox" name="logo_usage[]" id="logo_usage1" value="{{$logodata->id}}">
@endforeach	
<span class="error-message" style="display: none">Please check atleast one checkbox!</span>
</div>
           <h3>FONT type</h3>     
         <div class="form-group">
@foreach($logo_fonts as $fontdata)
<div class="col-xs-3">
<img src="{{asset('/public/'.$fontdata->img_path)}}" width="80px" height="70px">
<input type="checkbox" name="font_type[]" id="font_type1" value="{{$fontdata->id}}"/>
</div>
@endforeach
<span class="error-message" style="display: none">Please check atleast one checkbox!</span>
</div>   
           
           <div class="form-group">
<label class="control-label">Mention Your Specific Color (If any)</label>
<input type="text" name="other_font_type" id="other_font_type" class="form-control"  />
</div>
           
           <h3>Overall logo feel</h3>
    <div class="form-group">
@foreach($logo_feel as $logodata)
<div class="col-xs-3">
<div class="titles">{{$logodata->title}}</div>    
<img src="{{asset('/public/'.$logodata->img_path)}}" width="80px" height="70px">
<input type="checkbox" name="logo_feel[]" id="logo_feel1" value="{{$logodata->id}}"                     
       >
</div>
@endforeach		
<span class="error-message" style="display: none">Please check atleast one checkbox!</span>
</div>            
                
                
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
              </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-heading">
                  <h3 class="panel-title">Upload If you have any files, images, sketches, or other documents</h3>
            </div>
            <div class="panel-body">
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
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-4">
            <div class="panel-heading">
                 <h3 class="panel-title">All of our packages include our fantastic customer service and a dedicated project manager</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
@foreach($packages as $packagedata)
<div class="col-md-3 pricing-div pricing-div-1">
<p class="package-name">{{$packagedata->title}}</p>
<p class="old-price">${{$packagedata->regular_price}}</p>
<label class="new-price">$<span>{{$packagedata->sale_price}}</span></label>
{{strip_tags($packagedata->descp)}}
<label class="main-button main-button-white selectpackage" name="{{$packagedata->id}}" for="chkbx{{$packagedata->id}}" amount="{{$packagedata->sale_price}}"><input type="checkbox" name="packageselect[]" id="chkbx{{$packagedata->id}}" style="opacity: 0;position: absolute;">Get Started</label>
<!-- <a class="main-button main-button-white selectpackage" name="{{$packagedata->id}}" amount="{{$packagedata->sale_price}}">Get Started</a> -->
</div>
@endforeach
<span class="error-message" style="display: none">Please select atleast one package before place your order!</span>
<input type="hidden" name="package_name" id="package_name" value="">
<input type="hidden" name="package_amount" id="package_amount" value="">
<input type="hidden" name="addon_name" id="addon_name" value="">
<input type="hidden" name="addon_amount" id="addon_amount" value="">
</div>
   <div class="clearfix" style="height: 20px"></div>            
<div class="form-group">
<h3>Additional options</h3>  
@foreach($package_adon as $addondata)  
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
                
                <button class="btn btn-success pull-right" type="submit">Finish!</button>
            </div>
        </div>
    </form>
</div>
</div>
@extends('contributor.layouts.footer')
<style>
.container {
    width: 842px !important;
}
.stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 70%;
    position: relative;
}
.stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 70%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
</style>
<script>
    $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');
});
    
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection

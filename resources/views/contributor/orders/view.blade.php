@extends('contributor.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        View Order {{$orders->logo_name}}        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Orders</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
 
<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
              <div class="box-header with-border">
                <strong><h2 class="box-title">User Detail</h2></strong>
            </div>
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">{{$user->f_name}} {{$user->l_name}}</h3>
              <p class="text-muted text-center">{{$user->email}}</p>     
              <p class="text-muted text-left">Phone Number:{{$user->phone}}</p>     
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
<div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title">{{$order_type->name}}</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong></strong>
              <p>
                  <strong>Order Name:</strong>  {{$orders->logo_name}}               
              </p>
                
                          <p>
                              <strong> Category:</strong>  {{$orders->logo_cat}}                          
                          </p>
                          <!--
                           <p>
                              <strong> logo Slogan  : {{$orders->logo_slogan}}</strong>                              
                          </p>
                          <p>
                              <strong> Estate Website  : {{$orders->logo_web_url}}</strong>                              
                          </p>
                          <p>
                              <strong> Target Audience  : {{$orders->logo_target_audience}}</strong>                              
                          </p>
                          <p>
                              <strong> Description  : {{$orders->logo_descrip}}</strong>                              
                          </p>
                          <p>
                              <strong> Competitors URLs  : {{$orders->logo_competitor_url}}</strong>                              
                          </p>
                          -->

              <hr>

              

              <strong><h2>Summery</h2> </strong>

                    <p>
                    <strong> {{$packages->title}}  : {{$settings->site_currency_symbol}}{{$packages->sale_price}}</strong>                              
                    </p>
                      @if($payment_adon)
                    <p>
                    <strong> {{$payment_adon->title}}: {{$settings->site_currency_symbol}} {{$payment_adon->price}}</strong>                              
                    </p>
                    @endif
                    @if($coupon_code)
                    <p>
                    <strong> {{$coupon_code->coupon_code}}: {{$settings->site_currency_symbol}} {{$coupon_code->price}}</strong>                              
                    </p>
                    @endif
                    
              <hr>

              <strong>Total Amount:{{$settings->site_currency_symbol}}{{$payment->total_amount}}</strong>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- About Me Box -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#orderdetail" data-toggle="tab">Order Details</a></li>
              <li><a href="#logotype" data-toggle="tab">Logo Type</a></li>
              <li><a href="#logousage" data-toggle="tab">Logo Usage</a></li>
              <li><a href="#fonttype" data-toggle="tab">Font Type</a></li>
              <li><a href="#logofeel" data-toggle="tab">Logo Feel</a></li>
              <li><a href="#packages" data-toggle="tab">Packages</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="orderdetail">
                
                    <ul class="timeline timeline-inverse">              
                  <li class="time-label">
                        <span class="bg-green">
                         {{date("d M Y",strtotime($orders->created_at))}} 
                        </span>
                  </li>
                  <li>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header">LOGO DETAILS</h3>
                      <div class="timeline-body">
                      <div class="form-group">
                          <p>
                              <strong> Logo Name  : {{$orders->logo_name}}</strong>                              
                          </p>
                          <p>
                              <strong> logo Slogan  : {{$orders->logo_slogan}}</strong>                              
                          </p>
                          <p>
                              <strong> Category : {{$orders->logo_cat}}</strong>                              
                          </p>
                          <p>
                              <strong> Estate Website  : {{$orders->logo_web_url}}</strong>                              
                          </p>
                          <p>
                              <strong> Target Audience  : {{$orders->logo_target_audience}}</strong>                              
                          </p>
                          <p>
                              <strong> Description  : {{$orders->logo_descrip}}</strong>                              
                          </p>
                          <p>
                              <strong> Competitors URLs  : {{$orders->logo_competitor_url}}</strong>                              
                          </p>
                     </div>
                          
                      </div>
                    </li>
                    
                  <li>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header">Sample Logos</h3>
                      <div class="timeline-body">
                           @foreach( $logo_samples as $logo_sample )
                          <img src="{{asset('/public/uploads/order_logo/'.$logo_sample)}}" alt="{{$orders->title}}" class="margin" height="70px" width="80px">                        
                           @endforeach
                      </div>
                    </li>
                    
                    <li>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header">VISUAL REPRESENTATION</h3>
                      <div class="timeline-body">
                      <div class="form-group">
                          <p>
                              <strong> Describe images you LIKE to represent your business  : {{$orders->logo_visual_descp}}</strong>                              
                          </p>
                          <p>
                              <strong> Describe images you DON'T LIKE to represent your business  : {{$orders->logo_visual_images}}</strong>                              
                          </p>
                     </div>
                          
                      </div>
                    </li>
                    
                    <li>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header">Upload If you have any files, images, sketches, or other documents</h3>
                      <div class="timeline-body">
                      <div class="form-group">
                          <p>
                              <strong>  {{$orders->communication_team}}</strong>                              
                          </p>
                          
                     </div>
                          
                      </div>
                    </li>
                    
                    
                    
                    
                    <li>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header">Helpful Image Logos</h3>
                      <div class="timeline-body">
                           @foreach( $help_ful_images as $help_ful_image )
                          <img src="{{asset('/public/uploads/order_logo/'.$help_ful_image)}}" alt="{{$help_ful_image}}" class="margin" height="70px" width="80px">                        
                           @endforeach
                      </div>
                    </li>
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                     </ul>
                  
                  
                  
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="logotype">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">              
                  <li class="time-label">
                        <span class="bg-green">
                         {{date("d M Y",strtotime($orders->created_at))}} 
                        </span>
                  </li>
                  <li>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">{{$user->f_name}} {{$user->l_name}}</a> Select Logo Types</h3>

                      <div class="timeline-body">
                      @foreach( $logo_type as $logo_types )                        
                      <p>{{$logo_types->title}}</p> 
                        <img src="{{asset('/public/'.$logo_types->img_path)}}" alt="{{$logo_types->title}}" class="margin">                        
                        
                    @endforeach
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="logousage">
                <ul class="timeline timeline-inverse">              
                  <li class="time-label">
                        <span class="bg-green">
                         {{date("d M Y",strtotime($orders->created_at))}} 
                        </span>
                  </li>
                  <li>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">{{$user->f_name}} {{$user->l_name}}</a> Select Logo Usage</h3>

                      <div class="timeline-body">
                       @foreach( $logo_usages as $logo_usage )
                       <p>{{$logo_usage->title}} ({{strip_tags($logo_usage->descp)}})</p> 
                       @endforeach
                      
                    
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              
              <div class="tab-pane" id="fonttype">
                <ul class="timeline timeline-inverse">              
                  <li class="time-label">
                        <span class="bg-green">
                         {{date("d M Y",strtotime($orders->created_at))}} 
                        </span>
                  </li>
                  <li>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">{{$user->f_name}} {{$user->l_name}}</a> Select Logo Usage</h3>

                      <div class="timeline-body">     
                          @foreach( $logo_fonts as $logo_font )
                        <p>{{$logo_font->title}}</p> 
                        <img src="{{asset('/public/'.$logo_font->img_path)}}" alt="{{$logo_font->title}}" class="margin">                        
                       @endforeach
                     
                    
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              
              
              <div class="tab-pane" id="logofeel">
                <ul class="timeline timeline-inverse">              
                  <li class="time-label">
                        <span class="bg-green">
                         {{date("d M Y",strtotime($orders->created_at))}} 
                        </span>
                  </li>
                  <li>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">{{$user->f_name}} {{$user->l_name}}</a> Select Logo Feel</h3>

                      <div class="timeline-body">
                      @foreach( $logo_feel as $logo_feels )                        
                      <p>{{$logo_feels->title}}</p> 
                        <img src="{{asset('/public/'.$logo_feels->img_path)}}" alt="{{$logo_feels->title}}" class="margin">                        
                        
                    @endforeach
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              
              <div class="tab-pane" id="packages">
                <ul class="timeline timeline-inverse">                 
                  <li class="time-label">
                        <span class="bg-green">
                         {{date("d M Y",strtotime($orders->created_at))}} 
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                        <h3 class="timeline-header"><a href="#">{{$user->f_name}} {{$user->l_name}}</a> Select Package : <strong>{{$packages->title}}</strong></h3>

                      <div class="timeline-body">
                        <p>
                              <strong> Package Name  : {{$packages->title}}</strong>                              
                          </p>
                          <p>
                              <strong>Regular Price : {{$settings->site_currency_symbol}}{{$packages->regular_price}}</strong>                              
                          </p>
                          
                          <p>
                              <strong>Sale Price : {{$settings->site_currency_symbol}}{{$packages->sale_price}}</strong>                              
                          </p>
                          
                          <p>
                              <strong>Description : {{strip_tags($packages->descp)}}</strong>                              
                          </p>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
                    
                    <div class="row no-print">
        <div class="col-xs-12">
                    
          <button type="button" class="btn btn-success pull-right" id="generate_invoice"><i class="fa fa-credit-card"></i> Generate Invoice
             </button>
      
            <button type="button" class="btn btn-primary pull-right" id="generate_pdf" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
      <!-- /.row -->

    </section>


@extends('contributor.layouts.footer')
<script>
    $("#generate_invoice").click(function(){
     var order_id = {{$orders->id}};
     var invoice_url = "/fleekbizportal/contributor/invoices/generate-invoice/"+order_id;
     window.location.href=invoice_url;
})
</script>

<script>
    $("#generate_pdf").click(function(){   
     var order_id = {{$orders->id}};
     var invoice_url = "/fleekbizportal/contributor/orders/generatepdf/"+order_id;
     window.location.href=invoice_url;
})
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


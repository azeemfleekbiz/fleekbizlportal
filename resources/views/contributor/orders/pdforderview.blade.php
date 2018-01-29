<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
<link rel="stylesheet" href="{{asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/bower_components/Ionicons/css/ionicons.min.css')}}">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
  
<div class="wrapper">
    <div class="box">
     <div class="box-body">
<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
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
        
         </div>
    </div>
    </div>
</div>

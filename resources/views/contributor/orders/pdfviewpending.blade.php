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
  <link rel="stylesheet" href="{{asset('public/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('public/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
  
<div class="wrapper">    
    <section class="content-header">
      <h1>
        Pending Orders        
      </h1>      
    </section>
    <div class="box">
     <div class="box-body">
<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order Id</th>
                  <th>User Name</th>
                  <th>Order Name</th>
                  <th>Amount</th>                  
                  <th>Status</th>
                  <th>Payment</th>
                   <th>Order Date</th>                 
                </tr>
                </thead>
                <tbody>
                 @foreach( $orders as $order )           
                <tr>
                  <td>log00{{$order->id}}</td>
                  <td>{{$order->f_name}} {{$order->l_name}}</td>
                  <td>{{$order->logo_name}}</td>
                  <td>{{$settings->site_currency_symbol}}{{$order->total_amount}}</td>        
                  <td>@if($order->status==1)Complete @else Pending @endif</td>
                  <td>@if($order->is_paid==0)Unpaid @else Paid @endif</td>
                  <td>{{date("d M Y",strtotime($order->created_at))}}</td>                  
                </tr>           
                 @endforeach
                </tbody>
                
              </table>
         </div>
    </div>
</div>

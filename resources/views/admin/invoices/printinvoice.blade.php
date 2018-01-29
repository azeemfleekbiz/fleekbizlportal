<!DOCTYPE html>
<html {{ app()->getLocale() }}>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$page_title}}| Admin Area</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dist/css/AdminLTE.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Invoice.
            <small class="pull-right">{{ date('d/m/Y')}}</small>
          </h2>
        </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Admin, FleekBiz.</strong><br>
            Phone: (804) 123-5432<br>
            Email: {{$settings->payment_email}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>{{$user->f_name}} {{$user->l_name}}</strong><br>
            Phone: {{$user->phone}}<br>
            Email: {{$user->email}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          
          <br>
          <b>Order ID:</b> logo00{{$orders->id}}<br>
           <!--
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567
            -->
        </div>
        <!-- /.col -->
      </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>              
              <th>Order</th>
              <th>Subtotal</th>
            </tr>
            </thead>
          <tbody>
            <tr>
              <td>{{$packages->title}}</td>
              <td>{{$settings->site_currency_symbol}}{{$packages->sale_price}}</td>              
            </tr>
            @if($payment_adon)
            <tr>
              <td>{{$payment_adon->title}}</td>
              <td>{{$settings->site_currency_symbol}}{{$payment_adon->price}}</td>                 
            </tr>
              @endif
              @if($coupon_code)
            <tr>
              <td>{{$coupon_code->coupon_code}}</td>
              <td>{{$settings->site_currency_symbol}}{{$coupon_code->price}}</td>              
            </tr>
             @endif
            
            </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Payment Methods:</p>
        <img src="{{asset('public/dist/img/credit/stripe.png')}}" alt="Paypal" height="32px" width="51px">
          <img src="{{asset('public/dist/img/credit/paypal2.png')}}" alt="Paypal">

        
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
          <p class="lead">Amount</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">{{$packages->title}}:</th>
                <td>{{$settings->site_currency_symbol}}{{$packages->sale_price}}</td>
              </tr>
              @if($payment_adon)
              <tr>
                <th>{{$payment_adon->title}}</th>
                <td>{{$settings->site_currency_symbol}}{{$payment_adon->price}}</td>
              </tr>
              @endif
              @if($coupon_code)
              <tr>
                <th>{{$coupon_code->coupon_code}}:</th>
                <td>{{$settings->site_currency_symbol}}{{$coupon_code->price}}</td>
              </tr>
              @endif
              <tr>
                <th>Total:</th>
                <td>{{$settings->site_currency_symbol}}{{$payment->total_amount}}</td>
              </tr>
            </table>
          </div>
        </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>

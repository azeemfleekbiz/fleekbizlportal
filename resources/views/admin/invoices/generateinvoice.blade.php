@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
       Generate Invoice
      </h1>
      <ol class="breadcrumb">
          <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>              
          <li>Generate Invoice Invoices</li>
      </ol>
    </section>
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
              <td>{{$settings->site_currency_symbol}} {{$payment_adon->price}}</td>                 
            </tr>
              @endif
              @if($coupon_code)
            <tr>
              <td>{{$coupon_code->coupon_code}}</td>
              <td>{{$settings->site_currency_symbol}} {{$coupon_code->price}}</td>              
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
                <td>{{$settings->site_currency_symbol}} {{$payment_adon->price}}</td>
              </tr>
              @endif
              @if($coupon_code)
              <tr>
                <th>{{$coupon_code->coupon_code}}:</th>
                <td>{{$settings->site_currency_symbol}} {{$coupon_code->price}}</td>
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

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="{{ url('/admin/invoices/print-invoice/'.$orders->id) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Submit
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>

@extends('admin.layouts.footer')
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


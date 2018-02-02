@extends('contributor.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
       Pay Order    
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> <a href="{{ url('/contributor/dashboard') }}"> Dashboard</a></li>
        <li> Pay Order    </li>
        </ol>
    </section>
 <div class="box">
    
      @if (Session::has('message'))
     <div class="box-header">               
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            </div>
            @endif
            @if (Session::has('error'))
            <div class="box-header">     
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                 </div>
            @endif   
           <div class="col-md-6 scr_pay_right">
            <div class="scr_pay_right_inner">
               <h3>ORDER SUMMARY</h3>

                            <h4>{{$order->logo_name}}</h4>

                            <p>{{$order->orderpayment->package->title}} <span>{{$settings->site_currency_symbol}}{{$order->orderpayment->package->sale_price}}</span></p>
                            @if(isset($order->orderpayment->paymentadon))
                            <p>{{$order->orderpayment->paymentadon->title}} <span>{{$settings->site_currency_symbol}}{{$order->orderpayment->paymentadon->price}}</span></p>
                            @endif
                            @if(isset($order->orderpayment->coupon))
                            <p>{{$order->orderpayment->coupon->coupon_code}} <span>{{$settings->site_currency_symbol}}{{$order->orderpayment->coupon->price}}</span></p>

                            <h2 class="order_total">Total <span>{{$settings->site_currency_symbol}}{{$order->orderpayment->total_amount - (($order->orderpayment->total_amount * $order->orderpayment->coupon->price) / 100)}}</span></h2>
                            @else
                            <h2 class="order_total">Total <span>{{$settings->site_currency_symbol}}{{$order->orderpayment->total_amount}}</span></h2>
                            @endif
                            <div  id="coupon_error"></div>   
                            <div  id="coupon_success"></div>   
                            <div class="discnt_code">
                                <form method="post" id="applyCoupon" action="{{ url('/contributor/usecoupon') }}">
                                    {{csrf_field()}}	
                                    <input type="hidden" name="user_id" id="user_id" value="{{$order->user_id}}">	
                                    <input type="hidden" name="order_id" id="order_id" value="{{$order->id}}">
                                    <input type="hidden" name="package" id="package" value="{{$order->orderpayment->package->id}}">
                                    <input type="hidden" name="addon" id="addon" value="@if(isset($addon)){{$order->orderpayment->paymentadon->id}}@endif">
                                    <input type="hidden" name="payment" id="payment" value="{{$order->orderpayment->id}}">	
                                    <input type="hidden" name="total_amount" id="total_amount" value="{{$order->orderpayment->total_amount}}">	
                                    <input name="coupon_code" id="coupon_code" class="txtpayDetail" placeholder="HAVE A DISCOUNT CODE?" type="text">
                                  
                                    <button class="btn_discount_code" id="apply_coupon_code">APPLY</button> 
                                </form>	
                            </div>
                            
                            
            </div>
           </div>
       
       <div class="col-md-6 scr_pay_left">
<form action="{{ url('/stripe/charge.php') }}" method="POST" id="firstform">
<input type="hidden" name="order_id" id="order_id" value="{{$order->id}}">
<input type="hidden" name="login_user" id="user_id" value="login_user">
@if(isset($coupon))
<input type="hidden" name="pckg_amount" id="pckg_amount" value="{{$order->orderpayment->total_amount - (($order->orderpayment->total_amount * $order->orderpayment->coupon->price) / 100)}}">
<input type="hidden" name="pckg_month" id="pckg_month" value="">
<input type="hidden" name="pckg_decp" id="pckg_decp" value="LogoDesign Order ({{$settings->site_currency_symbol}}{{$payment->total_amount - (($order->orderpayment->total_amount * $order->orderpayment->coupon->price) / 100)}})">	
<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_5Mz31JYBByF1DhXtHEQDdGbB"
data-name="Fleekbiz Portal" data-description="LogoDesign Order ({{$settings->site_currency_symbol}}{{$order->orderpayment->total_amount - (($order->orderpayment->total_amount * $order->orderpayment->coupon->price) / 100)}})">
</script>
@else
<input type="hidden" name="pckg_amount" id="pckg_amount" value="{{$order->orderpayment->total_amount}}">
<input type="hidden" name="pckg_month" id="pckg_month" value="">
<input type="hidden" name="pckg_decp" id="pckg_decp" value="LogoDesign Order ({{$settings->site_currency_symbol}}{{$order->orderpayment->total_amount}})">	
<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_5Mz31JYBByF1DhXtHEQDdGbB"
data-name="Fleekbiz Portal" data-description="LogoDesign Order ({{$settings->site_currency_symbol}}{{$order->orderpayment->total_amount}})">
</script>
@endif
</form>  

</div>
                
          </div>


@extends('contributor.layouts.footerinner')
<script>
    $("#generate_pdf").click(function(){
    var invoice_url = "/fleekbizportal/admin/orders/complete-orders-pdf";
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


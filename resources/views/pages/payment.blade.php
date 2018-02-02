@include('layout.head')

<div class="container" id="step-5">
	
	
	<div class="stepwizard orderflow-1-steps">
	<div class="stepwizard-row setup-panel">
	<div class="stepwizard-step orderflow-steps skybluestep">
	<a href="#step-1" type="button" class="hidden navButton first">01</a>
	<h4>01</h4>
	<p>Personal Details</p>
	</div>
	<div class="stepwizard-step orderflow-steps skybluestep">
	<a href="#step-2" type="button" class="hidden navButton">02</a>
	<h4>02</h4>
	<p>Project Brief</p>
	</div>
	<div class="stepwizard-step orderflow-steps skybluestep">
	<a href="#step-3" type="button" class="hidden navButton">03</a>
	<h4>03</h4>
	<p>Additional Details</p>
	</div>
	<div class="stepwizard-step orderflow-steps btn-primary skybluestep">
	<a href="#step-4" type="button" class="hidden navButton">04</a>
	<h4>04</h4>
	<p>Pricing &amp; Packages</p>
	</div>
	
	<div class="stepwizard-step orderflow-steps btn-primary payment-tab-five">
	<a href="#step-5" type="button" class="hidden navButton">05</a>
	<h4>05</h4>
	<p>Secure &amp; Payment</p>
	
	</div>
	</div>
	</div>
	
	
</div><!--Main Container-->

<div class="orderflow5-row"> <!-- Orderflow5 row start here -->

	<div class="container">
		<p class="order_pkg_abv_p">Select the payment method and review you order</p>
		
		
		
	



<div class="col-md-6 scr_pay_right">
<div class="scr_pay_right_inner">
<h3>ORDER SUMMARY</h3>

<h4>LOGO DESIGN</h4>

<p>{{$package->title}} <span>{{$setting->site_currency_symbol}}{{$package->sale_price}}</span></p>
@if(isset($addon))
<p>{{$addon->title}} <span>{{$setting->site_currency_symbol}}{{$addon->price}}</span></p>
@endif
@if(isset($coupon))
<p>{{$coupon->coupon_code}} <span>%{{$coupon->price}}</span></p>

<h2 class="order_total">Total <span>{{$setting->site_currency_symbol}}{{$payment->total_amount - (($payment->total_amount * $coupon->price) / 100)}}</span></h2>
@else
<h2 class="order_total">Total <span>{{$setting->site_currency_symbol}}{{$payment->total_amount}}</span></h2>
@endif

@if(isset($error))
<div class="error">{{$error}}</div>
@endif
<div class="discnt_code">
<form name="applyCoupon" id="applyCoupon" method="post" action="{{ url('/usecoupon') }}">
{{csrf_field()}}	
<input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">	
<input type="hidden" name="order_id" id="order_id" value="{{$order->id}}">
<input type="hidden" name="package" id="package" value="{{$package->id}}">
<input type="hidden" name="addon" id="addon" value="@if(isset($addon)){{$addon->id}}@endif">
<input type="hidden" name="payment" id="payment" value="{{$payment->id}}">	
<input type="hidden" name="total_amount" id="total_amount" value="{{$payment->total_amount}}">	
<input name="coupon_code" id="coupon_code" class="txtpayDetail" placeholder="HAVE A DISCOUNT CODE?" type="text">
<input value="APPLY" class="btn_discount_code" type="submit">
</form>	
</div>
</div>
</div>	
<div class="col-md-6 scr_pay_left">

<div class="scr_pay_left_inner">
<img src="public/images/pay_stripe_logo.jpg" class="img-responsive" style="margin-bottom: 20px;">
<form action="{{ url('/stripe/charge.php') }}" method="POST" id="firstform">
<input type="hidden" name="order_id" id="order_id" value="{{$payment->id}}">
@if(isset($coupon))
<input type="hidden" name="pckg_amount" id="pckg_amount" value="{{$payment->total_amount - (($payment->total_amount * $coupon->price) / 100)}}">
<input type="hidden" name="pckg_month" id="pckg_month" value="">
<input type="hidden" name="pckg_decp" id="pckg_decp" value="LogoDesign Order ({{$setting->site_currency_symbol}}{{$payment->total_amount - (($payment->total_amount * $coupon->price) / 100)}})">	
<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_5Mz31JYBByF1DhXtHEQDdGbB"
data-name="Fleekbiz Portal" data-description="LogoDesign Order ({{$setting->site_currency_symbol}}{{$payment->total_amount - (($payment->total_amount * $coupon->price) / 100)}})">
</script>
@else
<input type="hidden" name="pckg_amount" id="pckg_amount" value="{{$payment->total_amount}}">
<input type="hidden" name="pckg_month" id="pckg_month" value="">
<input type="hidden" name="pckg_decp" id="pckg_decp" value="LogoDesign Order ({{$setting->site_currency_symbol}}{{$payment->total_amount}})">	
<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_5Mz31JYBByF1DhXtHEQDdGbB"
data-name="Fleekbiz Portal" data-description="LogoDesign Order ({{$setting->site_currency_symbol}}{{$payment->total_amount}})">
</script>
@endif
</form>  

</div>

</div>	

</div>
</div><!-- Orderflow5 row End here -->


@include('layout.footer')
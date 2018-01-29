@include('layout.head')

<div class="col-md-6 scr_pay_right">
<div class="scr_pay_right_inner">
<h3>ORDER SUMMARY</h3>

<h4>LOGO DESIGN</h4>

<p>{{$package->title}} <span>{{$setting->site_currency_symbol}}{{$package->sale_price}}</span></p>
@if(isset($addon))
<p>{{$addon->title}} <span>{{$setting->site_currency_symbol}}{{$addon->price}}</span></p>
@endif
@if(isset($coupon))
<p>{{$coupon->coupon_code}} <span>{{$setting->site_currency_symbol}}{{$coupon->price}}</span></p>

<h2 class="order_total">Total <span>{{$setting->site_currency_symbol}}{{$payment->total_amount - $coupon->price}}</span></h2>
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
@include('layout.footer')
@include('layout.head')

<div class="col-md-6 scr_pay_right">
<div class="scr_pay_right_inner">
<h3>ORDER SUMMARY</h3>

<h4>LOGO DESIGN</h4>

<p>{{$package->title}} <span>${{$package->sale_price}}</span></p>
@if($addon)
<p>{{$addon->title}} <span>${{$addon->price}}</span></p>
@endif

<h2 class="order_total">Total <span>${{$payment->total_amount}}</span></h2>

<div class="discnt_code">
<form name="applyCoupon" id="applyCoupon" method="post" action="">
<input type="hidden" name="total_amount" id="total_amount" value="{{$payment->total_amount}}">	
<input class="txtpayDetail" placeholder="HAVE A DISCOUNT CODE?" type="text">
<input value="APPLY" class="btn_discount_code" type="submit">
</form>	
</div>
</div>
		</div>	
@include('layout.footer')
@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
       Used Coupons        
      </h1>
      <ol class="breadcrumb">
          <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>     
          <li>Used Coupons</li>        
      </ol>
    </section>
 <div class="box">
            <div class="box-header">
                @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
        
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>            
                  <th>Order</th>
                  <th>User Name</th>
                  <th>Coupon Code</th>
                  <th>Payment</th>
                  <th>Coupon Percent</th>
                  <th>Order Date</th>
                 
                </tr>
                </thead>
                <tbody>
                @foreach( $used_coupons as $coupon_code )
                <tr>                              
                    <td>{{$coupon_code->coupon->payment->logoorder->logo_name}}</td>
                    <td>{{$coupon_code->user->f_name}} {{$coupon_code->user->l_name}} </td>
                    <td>{{$coupon_code->coupon->coupon_code}}</td>
                    <td>{{$settings->site_currency_symbol}}{{$coupon_code->coupon->payment->total_amount}}</td>
                    <td>{{$coupon_code->coupon->price}}%</td>
                     <td>{{date("d M Y",strtotime($coupon_code->coupon->payment->created_at))}}</td>
                </tr>

            @endforeach

            </tbody>  

        </table>
    </div>
    <!-- /.box-body -->
</div>

@extends('admin.layouts.footerinner')
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
@endsection


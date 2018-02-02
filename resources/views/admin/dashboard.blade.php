@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        Author Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>      
      </ol>
    </section>
 <section>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$orders}}</h3>

              <p>Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('/admin/orders') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$packages}}<sup style="font-size: 20px"></sup></h3>

              <p>Packages</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/packages') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$payment_adon}}</h3>

              <p>Payment Adons</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/admin/payment-adons') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!--
        <div class="col-lg-3 col-xs-6">
         
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$logo_type}}</h3>

              <p>Logo Types</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ url('/admin/logo-types') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        
        
        <div class="col-lg-3 col-xs-6">
        
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$logo_feel}}</h3>

              <p>Logo Feel</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('/admin/logo-types') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
        <div class="col-lg-3 col-xs-6">
         
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$logo_usage}}<sup style="font-size: 20px"></sup></h3>

              <p>Logo Usage</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/logo-usage') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        
        <div class="col-lg-3 col-xs-6">
         
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$logo_fonts}}</h3>

              <p>Log Fonts</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('/admin/logo-fonts') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         -->
       
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$coupon_codes}}</h3>

              <p>Coupons</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/coupons') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$users}}</h3>

              <p>Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/admin/users') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
      </div>
     

    </section>
 @extends('contributor.layouts.footerinner')
@endsection
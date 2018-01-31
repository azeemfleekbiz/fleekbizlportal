@extends('contributor.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        Contributor Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
           <li class="active"><i class="fa fa-dashboard"></i> <a href="{{ url('/contributor/dashboard') }}"> Dashboard</a></li>
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
      </div>
     

    </section>

 @extends('contributor.layouts.footer')
@endsection
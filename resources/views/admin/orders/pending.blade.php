@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
       Pending Orders        
      </h1>
      <ol class="breadcrumb">
          <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
          <li> <a href="{{ url('/admin/orders') }}"><i class="fa fa-first-order"></i> Orders</a></li>  
        <li> Pending Orders</li>
        
      </ol>
    </section>
 <div class="box">
       <div class="clearfix" style="margin-top: 20px"></div>
     <div class="row no-print">
        <div class="col-xs-12">            
            <button type="button" class="btn btn-primary pull-right" id="generate_pdf" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
     <div class="box-header">
                @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif        
            </div>
            <div class="box-header">
             
            </div>
            <!-- /.box-header -->
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
                  <th>Actions</th>
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
                  <td>@if($order->is_paid==1)Paid @else Unpaid @endif</td>
                  <td>{{date("d M Y",strtotime($order->created_at))}}</td>
                  <td><a href="{{ url('/admin/orders/order-detail/'.$order->id) }}" rel="" type="button" 
                          class="btn btn-info make-modal-large iframe-form-open" 
                          data-toggle="modal"  title="Edit logo font {{$order->logo_name}}">
                          <span class="glyphicon glyphicon-arrow-right"></span>
                       </a>
                        @if($order->status==0)
                      <a href="{{ url('/admin/orders/complete/'.$order->id) }}" rel="" type="button" 
                          class="btn btn-info make-modal-large iframe-form-open" 
                          data-toggle="modal"  title="Compete Order {{$order->logo_name}}">
                          <span class="glyphicon glyphicon-ok"></span>
                       </a>
                      @endif</td>
                </tr>
                 @endforeach
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>


@extends('admin.layouts.footer')
<script>
    $("#generate_pdf").click(function(){
    var invoice_url = "/fleekbizportal/admin/orders/pending-orders-pdf";
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


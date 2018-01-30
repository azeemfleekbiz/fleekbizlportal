@extends('contributor.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
       Paid Orders        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Paid Orders</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
 <div class="box">
       <div class="clearfix" style="margin-top: 20px"></div>
     <div class="row no-print">
        <div class="col-xs-12">
            <a href="{{url('contributor/orders/create-order')}}">   <button type="button" 
                class="btn btn-info make-modal-large iframe-form-open" 
                title="Add Order">
            <span class="glyphicon glyphicon-plus"></span>Add
        </button>
            </a>
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
                  <td><a href="{{ url('/contributor/orders/order-detail/'.$order->id) }}" rel="" type="button" 
                          class="btn btn-info make-modal-large iframe-form-open" 
                          data-toggle="modal"  title="Edit logo font {{$order->logo_name}}">
                          <span class="glyphicon glyphicon-arrow-right"></span>
                       </a>
                  </td>
                </tr>          
                 @endforeach
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>


@extends('contributor.layouts.footer')
<script>
    $("#generate_pdf").click(function(){
    var invoice_url = "/fleekbizportal/contributor/orders/paid-orders-pdf";
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


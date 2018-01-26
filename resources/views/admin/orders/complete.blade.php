@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        Complete Orders        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Complete Orders</a></li>
        <li class="active">Dashboard</li>
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
                   <th>Order Date</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                 @foreach( $orders as $order )
           
                <tr>
                  <td>log00{{$order->id}}</td>
                  <td>{{$order->user->f_name}} {{$order->user->l_name}}</td>
                  <td>{{$order->logo_name}}</td>
                  <td>{{$settings->site_currency_symbol}}500</td>        
                  <td>Complete</td>
                  <td>{{date("d M Y",strtotime($order->created_at))}}</td>
                  <td><a href="{{ url('/admin/orders/order-detail/'.$order->id) }}" rel="" type="button" 
                          class="btn btn-info make-modal-large iframe-form-open" 
                          data-toggle="modal"  title="Edit logo font {{$order->logo_name}}">
                          <span class="glyphicon glyphicon-arrow-right"></span>
                       </a>
                        <a href="#deleteorder{{$order->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Order ">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>
                </tr
           
                 @endforeach
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>


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


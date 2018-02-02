@extends('contributor.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Orders        
    </h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> <a href="{{ url('/contributor/dashboard') }}"> Dashboard</a></li>
        <li>Orders</li>
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
                    <td>{{$order->logo_name}}</td>
                    <td>{{$settings->site_currency_symbol}}{{$order->orderpayment->total_amount}}</td>        
                    <td>@if($order->orderpayment->status==1)Complete @else Pending @endif</td>
                    <td>@if($order->orderpayment->is_paid==0)Unpaid @else Paid @endif</td>
                    <td>{{date("d M Y",strtotime($order->created_at))}}</td>
                    <td>
                        <a href="{{ url('/contributor/orders/order-detail/'.$order->id) }}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="View order {{$order->logo_name}}">
                            <span class="glyphicon glyphicon-arrow-right"></span>
                        </a>
                        @if($order->orderpayment->status==0 || $order->orderpayment->is_paid==0)
                        <a href="{{ url('/contributor/orders/edit-order/'.$order->id) }}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Edit Order {{$order->logo_name}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        @endif
                        @if($order->orderpayment->is_paid==0)
                        <a href="{{ url('/contributor/orders/pay-order/'.$order->id) }}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Order Payment {{$order->logo_name}}">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                        </a>
                        @endif
                    </td>                 
                </tr>           
            @endforeach
            </tbody>

        </table>
    </div>
    <!-- /.box-body -->
</div>


@extends('contributor.layouts.footerinner')

<script>
    $("#generate_pdf").click(function () {
        var invoice_url = "/fleekbizportal/contributor/orders/generate-pdf";
        window.location.href = invoice_url;
    })
</script>
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


@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        View Order        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Orders</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
 <div class="box">
     
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Logo Name</th>
                  <th>Logo Slogan</th>
                  <th>logo Category</th>
                  <th>Logo Target Audience</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                 @foreach( $orders as $order )
                <tr>
                  <td>{{$order->title}}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
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


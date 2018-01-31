@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        Users        
      </h1>
      <ol class="breadcrumb">
         <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
        <li> Users</li>
        
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
     <!-- 
            <div class="box-header">
              <button rel="{{url('')}}" type="button" 
                class="btn btn-info make-modal-large iframe-form-open" 
                data-toggle="modal" data-target="#modal-default" title="Add Coupon">
            <span class="glyphicon glyphicon-plus"></span>Add
        </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>                 
                  <th>Email</th>                  
                  <th>Orders</th>   
                 
                </tr>
                </thead>
                <tbody>
                @foreach( $users as $user )    
                <tr>
                  <td>{{$user->f_name}} {{$user->l_name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{count($user->logoorders)}}</td>
                </tr>
                @endforeach
                </tbody>                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
@extends('admin.layouts.footer')
<script>
    $("#generate_pdf").click(function(){
    var invoice_url = "/fleekbizportal/admin/users/users-pdf";
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


@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        Orders Type
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Orders Type     </a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
 <div class="box">
            <div class="box-header">
             <button rel="{{url('')}}" type="button" 
                class="btn btn-info make-modal-large iframe-form-open" 
                data-toggle="modal" data-target="#modal-default" title="Add Logo Type">
            <span class="glyphicon glyphicon-plus"></span>Add
        </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>                  
                  <th>Name</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach( $order_types as $order_type )
                <tr>
                  <td>{{$order_type->name}}</td>
                  <td>
                      <a href="#editordertype{{$order_type->id}}" rel="" type="button" 
                class="btn btn-info make-modal-large iframe-form-open" 
                data-toggle="modal"  title="Edit Order Type {{$order_type->name}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>                      
                      
                        <a href="#deletecoupon{{$order_type->id}}" rel="" type="button" 
                class="btn btn-info make-modal-large iframe-form-open" 
                data-toggle="modal"  title="Delete Order type">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                  </td>                  
                </tr>  
                
                <div class="modal fade" id="editordertype{{$order_type->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Order Type</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="POST" action="{{url('/admin/order-type/update-Order-type')}}">
                   {{ csrf_field() }}
                   <input type="hidden" name="order_id" value="{{$order_type->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Order Type</label>
                  <input type="text" name="name" value="{{$order_type->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Order Type name" required="required">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn_save">Save</button>
              </div>
            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                
                
                <div class="modal fade" id="deletecoupon{{$order_type->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Delete Order Type</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Delete this Order Type <b>{{$order_type->name}}</b>?</p>  

                                            <div class="modal-footer">
                                               <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                               <a href="{{ url('/admin/order-type/destroy/'.$order_type->id) }}">
                                               <button 
                                                     class="btn btn-primary">Delete</button>
                                                </a>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
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
                <h4 class="modal-title">Add New Order Type</h4>
              </div>
              <div class="modal-body">
                  <form role="form" method="POST" action="{{url('/admin/order-type/save-Order-type')}}">
                   {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Order Type</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Order Type name" required="required">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn_save">Save</button>
              </div>
            </form>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
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


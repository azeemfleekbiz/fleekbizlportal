@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        Coupons        
      </h1>
      <ol class="breadcrumb">
          <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>     
          <li>Coupons</li>
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
                  <th>Coupon Code</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $coupon_codes as $coupon_code )
                <tr>                              
                    <td>{{$coupon_code->coupon_code}}</td>
                    <td>{{$coupon_code->price}}%</td>
                    <td><a href="#editcoupons{{$coupon_code->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Edit logo font {{$coupon_code->coupon_code}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deletecoupons{{$coupon_code->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Logo font">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>
                </tr>


            <div class="modal fade" id="editcoupons{{$coupon_code->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Coupon Code</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="{{url('/admin/coupons/update-coupon')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="coupon_code_id" value="{{$coupon_code->id}}">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Order Type</label>
                                        <select class="form-control" name="order_type_id" id="order_type_id" required="required">
                                            <option value="">Select Order Type</option> 
                                            @foreach( $order_types as $order_type )
                                            <option value="{{$order_type->id}}" @if ($order_type->id == $coupon_code->order_type_id) selected="selected"  @endif>{{$order_type->name}}</option>                   
                                            @endforeach
                                        </select>          
                                    </div> 
                                    <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Code</label>
                            <input type="text" name="coupon_code" value="{{$coupon_code->coupon_code}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Coupon Code" required="required">
                        </div> 
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Price</label>
                            <input type="text" name="price" value="{{$coupon_code->price}}"  class="form-control" id="exampleInputEmail1" placeholder="Enter Coupon Price" required="required">
                        </div> 
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">Description </label>
                            <br>
                            <div class="col-sm-10">
                                <textarea required="required" name="description" class="textarea" placeholder="Coupon Code Description"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$coupon_code->descp}}</textarea>
                            </div>
                            <div style="height: 10px"></div>
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



            <div class="modal fade" id="deletecoupons{{$coupon_code->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete Coupon Code</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to Delete this Coupon Code <b>{{$coupon_code->coupon_code}}</b>?</p>  

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                <a href="{{ url('/admin/logo-fonts/coupons/'.$coupon_code->id) }}">
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
                <h4 class="modal-title">Add New Coupon Code</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('/admin/coupons/save-coupon')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Order Type</label>
                            <select class="form-control" name="order_type_id" id="order_type_id" required="required">
                                <option value="">Select Order Type</option> 
                                @foreach( $order_types as $order_type )
                                <option value="{{$order_type->id}}">{{$order_type->name}}</option>                   
                                @endforeach
                            </select>          
                        </div>                         
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Code</label>
                            <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1" placeholder="Enter Coupon Code" required="required">
                        </div> 
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Price</label>
                            <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter Coupon Amount in %" required="required">
                        </div> 
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">Description </label>
                            <br>
                            <div class="col-sm-10">
                                <textarea required="required" name="description" class="textarea" placeholder="Coupon Code Description"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                            <div style="height: 10px"></div>
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


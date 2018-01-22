@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Package Payment Adons
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Package Payment Adons    </a></li>
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
                    <th>Title</th>    
                    <th>Price</th>   
                    <th>Status</th>   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $payments_adons as $payments_adon )
                <tr>
                    <td>{{$payments_adon->title}}</td>    
                    <th>{{$payments_adon->price}}</th>   
                    <th>{{$payments_adon->status}}</th> 
                    <td><a href="#editpaymentsadon{{$payments_adon->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Edit Package Payment Admon {{$payments_adon->title}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deletepaymentsadon{{$payments_adon->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Logo font">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>
                </tr>


            <div class="modal fade" id="editpaymentsadon{{$payments_adon->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Package Payment Adon</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="{{url('/admin/payment-adons/update-payment-adon')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="payment_adon_id" value="{{$payments_adon->id}}">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Order Type</label>
                                        <select class="form-control" name="order_type_id" id="order_type_id" required="required">
                                            <option value="">Select User Role</option> 
                                            @foreach( $order_types as $order_type )
                                            <option value="{{$order_type->id}}" @if ($order_type->id === $payments_adon->order_type_id) selected="selected"  @endif>{{$order_type->name}}</option>                   
                                            @endforeach
                                        </select>          
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Payment Adon Title</label>
                                        <input type="text" name="title" value="{{$payments_adon->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Payment Adon Title" required="required">
                                    </div>                                                                      

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="text" name="price" value="{{$payments_adon->price}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Payment Price" required="required">
                                    </div>                  

                                    
                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload Image</label>
                                        <input type="file" name="img_path" id="exampleInputFile">
                                        <input type="hidden" name="package_payment_image" value="{{$payments_adon->img_path}}">
                                        <img style="float:right;" src="{{asset('public/'.$payments_adon->img_path)}}"> 
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description </label>
                                        <br>
                                        <div class="col-sm-10">
                                            <textarea required="required" name="description" class="textarea" placeholder="Package Payment Adon Description"
                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$payments_adon->descp}}</textarea>
                                        </div>
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



            <div class="modal fade" id="deletepaymentsadon{{$payments_adon->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete Package Payment Adon</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to Delete this Package Payment Adon <b>{{$payments_adon->title}}</b>?</p>  

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                <a href="{{ url('/admin/payment-adons/destroy/'.$payments_adon->id) }}">
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
                <h4 class="modal-title">Add New Logo Font</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('/admin/payment-adons/save-payment-adon')}}" enctype="multipart/form-data">
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
                            <label for="exampleInputEmail1">Payment Adon Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Payment Adon Title" required="required">
                        </div>                            

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" name="price"  class="form-control" id="exampleInputEmail1" placeholder="Enter Package Sale Price" required="required">
                        </div>                  

                        

                        
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Image</label>
                            <input type="file" name="img_path" id="exampleInputFile">
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description </label>
                            <br>
                            <div class="col-sm-10">
                                <textarea required="required" name="description" class="textarea" placeholder="Package Payment Adon Description"
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
@extends('admin.layouts.footer')
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


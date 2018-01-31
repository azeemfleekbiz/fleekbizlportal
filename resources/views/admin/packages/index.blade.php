@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Packages      
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Packages</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<div class="box">
    @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
    <div class="box-header">
        <button rel="{{url('')}}" type="button" 
                class="btn btn-info make-modal-large iframe-form-open" 
                data-toggle="modal" data-target="#modal-default" title="Add Packages">
            <span class="glyphicon glyphicon-plus"></span>Add
        </button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Regular Price</th>
                    <th>Sale Price</th>                  
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $packages as $packages )
                <tr>
                    <td>{{$packages->title}}</td>
                    <td>{{$settings->site_currency_symbol}}{{$packages->regular_price}}</td>
                    <td>{{$settings->site_currency_symbol}}{{$packages->sale_price}}</td>
                    <td> <a href="#editpackage{{$packages->id}}" rel="" type="button" 
                            class="btn btn-info make-modal-large iframe-form-open" 
                            data-toggle="modal"  title="Edit Package {{$packages->title}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deletepackage{{$packages->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Package">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>                  
                </tr>

            <div class="modal fade" id="editpackage{{$packages->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Package</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="{{url('/admin/packages/update-package')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="package_id" value="{{$packages->id}}">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Order Type</label>
                                        <select class="form-control" name="order_type_id" id="order_type_id" required="required">
                                            <option value="">Select Order Type</option> 
                                            @foreach( $order_types as $order_type )
                                            <option value="{{$order_type->id}}" @if ($order_type->id == $packages->order_type_id) selected="selected"  @endif>{{$order_type->name}}</option>                   
                                            @endforeach
                                        </select>          
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" name="title" value="{{$packages->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Title" required="required">
                                    </div>                  
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Regular Price</label>
                                        <input type="text" name="regular_price" value="{{$packages->regular_price}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Regualr Price" required="required">
                                    </div>                  
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sale Price</label>
                                        <input type="text" name="sale_price" value="{{$packages->sale_price}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Sale Price" required="required">
                                    </div>                  
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description </label>
                                        <br>
                                        <div class="col-sm-10">
                                            <textarea required="required" name="description" class="textarea" placeholder="Package Description"
                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$packages->descp}}</textarea>
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

            
            <div class="modal fade" id="deletepackage{{$packages->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Delete Package</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Delete this Package <b>{{$packages->title}}</b>?</p>  

                                            <div class="modal-footer">
                                               <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                               <a href="{{ url('/admin/packages/destroy/'.$packages->id) }}">
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
                <h4 class="modal-title">Add New Package</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('/admin/packages/save-package')}}">
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
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Title" required="required">
                        </div>                  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Regular Price</label>
                            <input type="text" name="regular_price" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Regualr Price" required="required">
                        </div>                  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sale Price</label>
                            <input type="text" name="sale_price" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Sale Price" required="required">
                        </div>                  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description </label>
                            <br>
                            <div class="col-sm-10">
                                <textarea required="required" name="description" class="textarea" placeholder="Package Description"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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


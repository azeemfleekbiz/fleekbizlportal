@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Logo Usage 
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Logo Usage      </a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<div class="box">
    <div class="box-header">
        <button rel="" type="button" 
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $logo_usage as $logo_usages )
                <tr>
                    <td>{{$logo_usages->title}}</td>                                  
                    <td><a href="#editlogotype{{$logo_usages->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Edit logo Type {{$logo_usages->title}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deletelogotype{{$logo_usages->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Logo Type">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>
                </tr>


            <div class="modal fade" id="editlogotype{{$logo_usages->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Logo Usage</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="{{url('/admin/logo-usage/update-logo-usage')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="logo_usage_id" value="{{$logo_usages->id}}">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Order Type</label>
                                        <select class="form-control" name="order_type_id" id="order_type_id" required="required">
                                            <option value="">Select User Role</option> 
                                            @foreach( $order_types as $order_type )
                                            <option value="{{$order_type->id}}" @if ($order_type->id === $logo_usages->order_types) selected="selected"  @endif>{{$order_type->name}}</option>                   
                                            @endforeach
                                        </select>          
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" name="title" value="{{$logo_usages->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Logo Title" required="required">
                                    </div>                 
                                                    

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description </label>
                                        <br>
                                        <div class="col-sm-10">
                                            <textarea required="required" name="description" class="textarea" placeholder="Package Description"
                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$logo_usages->descp}}</textarea>
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

            
            
            <div class="modal fade" id="deletelogotype{{$logo_usages->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Delete Logo usage</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Delete this Logo Type <b>{{$logo_usages->title}}</b>?</p>  

                                            <div class="modal-footer">
                                               <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                               <a href="{{ url('/admin/logo-usage/destroy/'.$logo_usages->id) }}">
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
                <h4 class="modal-title">Add New Logo Usage</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('/admin/logo-usage/save-logo-usage')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Order Type</label>
                            <select class="form-control" name="order_type_id" id="order_type_id" required="required">
                                <option value="">Select Order Role</option> 
                                @foreach( $order_types as $order_type )
                                <option value="{{$order_type->id}}">{{$order_type->name}}</option>                   
                                @endforeach
                            </select>          
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Logo Title" required="required">
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


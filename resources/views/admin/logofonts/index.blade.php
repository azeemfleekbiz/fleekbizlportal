@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Logo Fonts
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Logo Fonts     </a></li>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $logo_fonts as $logo_font )
                <tr>
                    <td>{{$logo_font->title}}</td>                                   
                    <td><a href="#editlogofont{{$logo_font->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Edit logo font {{$logo_font->title}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deletelogofont{{$logo_font->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Logo font">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>
                </tr>


            <div class="modal fade" id="editlogofont{{$logo_font->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Logo Font</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="{{url('/admin/logo-fonts/update-logo-font')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="logo_font_id" value="{{$logo_font->id}}">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Order Type</label>
                                        <select class="form-control" name="order_type_id" id="order_type_id" required="required">
                                            <option value="">Select User Role</option> 
                                            @foreach( $order_types as $order_type )
                                            <option value="{{$order_type->id}}" @if ($order_type->id === $logo_font->order_types) selected="selected"  @endif>{{$order_type->name}}</option>                   
                                            @endforeach
                                        </select>          
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Logo Font Title</label>
                                        <input type="text" name="title" value="{{$logo_font->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Logo Font Title" required="required">
                                    </div>                                                                      

                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload Image</label>
                                        <input type="file" name="img_path" id="exampleInputFile">
                                        <input type="hidden" name="logo_font_image" value="{{$logo_font->img_path}}">
                                        <img style="float:right;" src="{{asset('public/'.$logo_font->img_path)}}"> 
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



            <div class="modal fade" id="deletelogofont{{$logo_font->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete Logo Font</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to Delete this Logo Font <b>{{$logo_font->title}}</b>?</p>  

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                <a href="{{ url('/admin/logo-fonts/destroy/'.$logo_font->id) }}">
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
                <form role="form" method="POST" action="{{url('/admin/logo-fonts/save-logo-font')}}" enctype="multipart/form-data">
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
                            <label for="exampleInputEmail1">Logo Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Logo Title" required="required">
                        </div>                            
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Image</label>
                            <input type="file" name="img_path" id="exampleInputFile">
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


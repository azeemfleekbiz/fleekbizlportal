@extends('contributor.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        Update {{$user->f_name}} {{$user->l_name}}
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Update Profile</a></li>
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
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-horizontal">      
              <div class="box-body">                  
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">User Role</label>

                  <div class="col-sm-10">
                      <span>
                      @foreach( $user_role as $userrole )
                      @if ($userrole->id === $user->user_role) {{$userrole->name}}   @endif                              
                     @endforeach
                      </span>                </div>
                </div> 
                  
                  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>

                  <div class="col-sm-10">
                      <span>  {{$user->f_name}}</span>
                  </div>
                </div>
                  
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>

                  <div class="col-sm-10">
                      <span> {{$user->l_name}}</span>
                  </div>
                </div>
                  
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                      <span>{{$user->email}}</span>
                  </div>
                </div>
                  
                  
                  
                  
                  
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>

                  <div class="col-sm-10" >
                    <span>  {{$user->phone}}</span>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer" align="center">
                  <button  rel="{{url('')}}" type="button" 
                class="btn btn-info make-modal-large iframe-form-open" 
                data-toggle="modal" data-target="#modal-default" title="Update Profile">
            Update Profile
         </button>
                
              </div>
              <!-- /.box-footer -->
            </div>
          </div>
            <!-- /.box-body -->
          </div>
          
          
          <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Profile</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('contributor/update-profile')}}" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                     <input type="hidden" name="user_role" value="{{$user->user_role}}">
                    <div class="box-body">
                                               
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" name="f_name" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name" required="required" value="{{$user->f_name}}">
                        </div> 
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" name="l_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name" required="required" value="{{$user->l_name}}">
                        </div> 
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" required="required" value="{{$user->email}}">
                        </div> 
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number" required="required" value="{{$user->phone}}">
                        </div> 
                        
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="btn_save" name="submit">Update</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
 @extends('contributor.layouts.footer')
@endsection
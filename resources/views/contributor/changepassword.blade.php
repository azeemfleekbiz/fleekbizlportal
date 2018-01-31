@extends('contributor.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        Change Password     
      </h1>
      <ol class="breadcrumb">
           <li class="active"><i class="fa fa-dashboard"></i> <a href="{{ url('/contributor/dashboard') }}"> Dashboard</a></li>
           <li> Change Password</li>
      </ol>
    </section>

<div class="box">
            <div class="box box-info">
            
           <form class="form-horizontal" method="POST" action="{{url('/contributor/password-reset')}}">
                 {{ csrf_field() }}
              <div class="box-body">                  
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">New Password</label>

                  <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="required">
                  </div>
                </div>
                  
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>

                  <div class="col-sm-10">
                      <input type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="Confirm Password" required="required">
                   <span id='message'></span>
                  </div>
                </div>                  
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <input type="submit" class="btn btn-info pull-right" value="Submit" id="contributorpassword"></button>
                 
                <button type="reset" value="Reset" class="btn btn-info pull-left" style="margin-left: 672px">Reset</button>
              </div>
              <!-- /.box-footer -->
            </form>
            
          </div>
            <!-- /.box-body -->
          </div>


@extends('contributor.layouts.footer')
<script>
 $('#password, #password-confirm').on('keyup', function () {  
  if ($('#password').val() == $('#password-confirm').val()) {
    $('#message').html('Matching').css('color', 'green');
    $("input[type=submit]").removeAttr("disabled");
     return true;
  } else 
    $('#message').html('Password and Confime Passwod Not Matching').css('color', 'red');
    $("input[type=submit]").attr("disabled", "disabled");
});

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

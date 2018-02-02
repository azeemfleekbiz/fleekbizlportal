@extends('contributor.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
       Payment Thanks
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> <a href="{{ url('/contributor/dashboard') }}"> Dashboard</a></li>
        <li> Payment Thanks   </li>
        </ol>
    </section>
 <div class="box">
     <div class="box-header">               
                <div class="alert alert-success">Thanks for the Payment !!!</div>
            </div>
       
       
                
          </div>


@extends('contributor.layouts.footer')
<script>
    $("#generate_pdf").click(function(){
    var invoice_url = "/fleekbizportal/admin/orders/complete-orders-pdf";
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


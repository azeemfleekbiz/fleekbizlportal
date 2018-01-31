@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Setting        
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
        <li> Setting</li>        
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
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>                
                    <th>Currency Code</th>                    
                    <th>Currency Symbol</th>
                    <th>Payment Email</th>
                    <th>Payment Mood</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $settings as $setting )
                <tr>                              
                    <td>{{$setting->site_currency_code}}</td>
                    <td>{{$setting->site_currency_symbol}}</td>
                    <td>{{$setting->payment_email}}</td>
                    <td>{{$setting->payment_mood}}</td>                   
                    <td><a href="#editsettings{{$setting->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Edit Setting {{$setting->site_currency_code}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </td>
                </tr>


            <div class="modal fade" id="editsettings{{$setting->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Settings</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="{{url('/admin/settings/update')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="setting_id" value="{{$setting->id}}">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Currency Type</label>
                                        <select class="form-control" name="currency_Code" id="currency" required="required">
                                        <option value="">Please choose a currency</option> 
                                        <option value="USD" @if ($setting->site_currency_code == 'USD' ) selected="selected"  @endif>US Dollars</option>
                                        <option value="EUR" @if ($setting->site_currency_code == 'EUR') selected="selected"  @endif>Euros</option>
                                        <option value="GBP" @if ($setting->site_currency_code == 'GBP') selected="selected"  @endif>Pounds</option>
                    </select> 
                                         <input type="hidden" name="currency_symbol" id="currency_symbol" value="" />
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="payment_email" value="{{$setting->payment_email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Payment Email" required="required">
                                    </div> 

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Payment Mode</label>
                                        <select class="form-control" name="payment_mood" id="payment_mood" required="required">
                                        <option value="Stripe" selected="selected">Stripe</option>
                                        <!--
                                        <option value="PayPal" @if ($setting->payment_mood == 'PayPal' ) selected="selected"  @endif>PayPal</option>
                                        <option value="Credict Card" @if ($setting->payment_mood == 'Credict Card') selected="selected"  @endif>Credict Card</option>
                                        <option value="Skrill" @if ($setting->payment_mood == 'Skrill') selected="selected"  @endif>Skrill</option>
                                        <option value="2CheckOut" @if ($setting->payment_mood == '2CheckOut') selected="selected"  @endif>2CheckOut</option>
                                        <option value="ACH Payments" @if ($setting->payment_mood == 'ACH Payments') selected="selected"  @endif>ACH Payments</option>
                                        <option value="Authorize.Net" @if ($setting->payment_mood == 'Authorize.Net') selected="selected"  @endif>Authorize.Net</option>
                                        <option value="WePay" @if ($setting->payment_mood == 'WePay') selected="selected"  @endif>WePay</option>
                                       <option value="Amazon Payments" @if ($setting->payment_mood == 'Amazon Payments') selected="selected"  @endif>Amazon Payments</option>
                                      -->
                                       </select> 
                                        
                                        
                                        
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
                <h4 class="modal-title">Add New Setting</h4>
            </div>            
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('/admin/settings/create')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <select class="form-control" name="currency_Code" id="currency" required="required">
                        <option value="">Select Currency Type</option> 
                        <option value="USD">US Dollars</option>
                        <option value="EUR">Euros</option>
                        <option value="GBP">Pounds</option>
                    </select>                  
                    <input type="hidden" name="currency_symbol" id="currency_symbol" value="" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Payment Email</label>
                        <input type="email" name="payment_email" class="form-control" id="exampleInputEmail1" placeholder="Enter Coupon Code" required="required">
                    </div> 

                    <div class="form-group">
                        <label for="exampleInputEmail1">Payment Mode</label>
                        <input type="text" name="payment_mood" class="form-control" id="exampleInputEmail1" placeholder="Enter Coupon Code Price" required="required">
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
<script type="text/javascript">
$(document).ready(function() {
    // You can configure the map of currency codes to symbols.  Please
    // send mail to support@salsalabs.com if you have any questions at all.
    var currencySymbolMap = {
      "USD": "$",
      "EUR": "â‚¬",
      "GBP": "Â£"
    };
    var symbols = Object.keys(currencySymbolMap).map(function(key) {
      return currencySymbolMap[key];
    })
    var amtRegex = RegExp('^(\\' + symbols.join('|\\') + ')(\\d+)');
    var otherRegex = RegExp('^\\s*(other\\s*)(\\' + symbols.join('|\\') + ')\\s*');

    // Change handler for the currency code field. Modifies the currency symbol
    // and updates all of the amount and other labels.
    function currencyChangeHandler() {
      var key = $("#currency option:selected").val();
      if (currencySymbolMap.hasOwnProperty(key)) {
        $('#currency_symbol').val(currencySymbolMap[key]);
        $('label[for^=amt]').each(updateLabel);
        $('label[for^=other]').each(updateOther);
      }
    }
    // Update an amount label using the current currency symbol.
    function updateLabel() {
      var m = amtRegex.exec($(this).text());
      if (m != null) {
        $(this).text($('#currency_symbol').val() + m[2]);
      }
    }
    // Update the other amount label(s) using the current currency symbol.
    function updateOther() {
      var m = otherRegex.exec($(this).text());
      if (m != null) {
        $(this).text(m[1] + $('#currency_symbol').val());
      }
    }
    // Define a change handler for the currency field.
    $('#currency').change(currencyChangeHandler);   
    currencyChangeHandler();
});
</script>
@endsection


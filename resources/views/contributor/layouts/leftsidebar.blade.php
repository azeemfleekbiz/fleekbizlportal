<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">        
            <li class="active">
              <a href="{{ url('/contributor/dashboard') }}">
              <i class="fa fa-dashboard" aria-hidden="true"></i> <span>Dashboard</span>            
              </a>          
          </li> 
             <li class="treeview">
          <a href="">
            <i class="fa fa-first-order" aria-hidden="true"></i> <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>     
            <ul class="treeview-menu">             
            <li class="active"><a href="{{ url('/contributor/orders') }}"><i class="fa fa-circle-o"></i>Orders</a></li>
            <li><a href="{{ url('/contributor/orders/complete-orders') }}"><i class="fa fa-circle-o"></i> Complete Orders</a></li>    
            <li><a href="{{ url('/contributor/orders/pending-orders') }}"><i class="fa fa-circle-o"></i> Pending  Orders</a></li>    
            <li><a href="{{ url('/contributor/orders/paid-orders') }}"><i class="fa fa-circle-o"></i> Paid Orders</a></li>    
            <li><a href="{{ url('/contributor/orders/unpaid-orders') }}"><i class="fa fa-circle-o"></i> Un Paid Orders</a></li>    
            
            
          </ul>
        </li>  
        <li style="display:none;">
                <a href=""><i class="fa fa-envelope" aria-hidden="true"></i> 
                    Invoices
                </a>
            </li>
            <li>
                <a href="{{url('contributor/profile')}}"><i class="fa fa-user" aria-hidden="true"></i>
                    Profile
                </a>
            </li>
            <li>
          <a href="{{ url('/contributor/change-password') }}">
            <i class="fa fa-user" aria-hidden="true"></i> <span>Change Password</span>                    
          </a>
        </li>
            <li>
                <a href="{{url('contributor/logout')}}"><i class="fa fa-power-off" aria-hidden="true"></i>
                    SignOut</a>
            </li>












        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">     
      <li class="active">
          <a href="{{ url('/admin/dashboard') }}">
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
            <li class="active"><a href="{{ url('/admin/orders') }}"><i class="fa fa-circle-o"></i>Orders</a></li>
            <li><a href="{{ url('/admin/orders/complete-orders') }}"><i class="fa fa-circle-o"></i> Complete Orders</a></li>    
            <li><a href="{{ url('/admin/orders/pending-orders') }}"><i class="fa fa-circle-o"></i> Pending  Orders</a></li>    
            <li><a href="{{ url('/admin/orders/paid-orders') }}"><i class="fa fa-circle-o"></i> Paid Orders</a></li>    
            <li><a href="{{ url('/admin/orders/unpaid-orders') }}"><i class="fa fa-circle-o"></i> Un Paid Orders</a></li>    
            
            
          </ul>
        </li>        
        
       <li class="treeview">
          <a href="">
           <i class="fa fa-gears" aria-hidden="true"></i><span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="active" style="display:none;"><a href="{{ url('/admin/orders') }}"><i class="fa fa-circle-o"></i>Orders</a></li>
            <li class="active"><a href="{{ url('/admin/order-type') }}"><i class="fa fa-circle-o"></i>Order Type</a></li>
            <li><a href="{{ url('/admin/packages') }}"><i class="fa fa-circle-o"></i> Packages</a></li>    
            <li><a href="{{ url('/admin/payment-adons') }}"><i class="fa fa-circle-o"></i> Packages Payment Adons</a></li>  
            <li><a href="{{ url('/admin/logo-types') }}"><i class="fa fa-circle-o"></i> Logo Type</a></li>
            <li><a href="{{ url('/admin/logo-usage') }}"><i class="fa fa-circle-o"></i> Logo Usage</a></li>
            <li><a href="{{ url('/admin/logo-fonts') }}"><i class="fa fa-circle-o"></i> Logo Fonts</a></li>
            <li><a href="{{ url('/admin/settings') }}"><i class="fa fa-circle-o"></i> Setting</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="">
              <i class="fa fa-gift" aria-hidden="true"></i> <span>Coupons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ url('/admin/coupons') }}"><i class="fa fa-gift" aria-hidden="true"></i>Coupon Codes</a></li>
             <li><a href="{{ url('/admin/used-coupons') }}"><i class="fa fa-gift" aria-hidden="true"></i>Used Coupons</a></li>
          </ul>
        </li> 
        
        <li>
          <a href="{{ url('/admin/users') }}">
            <i class="fa fa-user" aria-hidden="true"></i> <span>Users</span>        
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        
        <li>
          <a href="{{ url('/admin/change-password') }}">
            <i class="fa fa-user" aria-hidden="true"></i> <span>Change Password</span>        
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        
        <li>
          <a href="{{ url('admin/logout') }}">
            <i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span>  
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">        
        <li class="active treeview">
          <a href="{{ url('/admin') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>     
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>          
        </li>
       <li class="treeview">
          <a href="">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="active"><a href="{{ url('/admin/orders') }}"><i class="fa fa-circle-o"></i>Orders</a></li>
            <li class="active"><a href=""><i class="fa fa-circle-o"></i>Order Type</a></li>
            <li><a href="{{ url('/admin/packages') }}"><i class="fa fa-circle-o"></i> Packages</a></li>    
            <li><a href="{{ url('/admin/payment-adons') }}"><i class="fa fa-circle-o"></i> Packages Payment Adons</a></li>  
            <li><a href="{{ url('/admin/logo-types') }}"><i class="fa fa-circle-o"></i> Logo Type</a></li>
            <li><a href="{{ url('/admin/logo-usage') }}"><i class="fa fa-circle-o"></i> Logo Usage</a></li>
            <li><a href="{{ url('/admin/logo-fonts') }}"><i class="fa fa-circle-o"></i> Logo Fonts</a></li>
            
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
             <li><a href=""><i class="fa fa-gift" aria-hidden="true"></i>Used Coupons</a></li>
          </ul>
        </li>  
              
        <li>
          <a href="{{ url('/admin/invoices') }}">
            <i class="fa fa-files-o" aria-hidden="true"></i> <span>Invoices</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>          
        </li>        
        <li>
          <a href="{{ url('/admin/payments') }}">
            <i class="fa fa-money" aria-hidden="true"></i> <span>Payments</span>        
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        
        <li>
          <a href="{{ url('/admin/users') }}">
            <i class="fa fa-user" aria-hidden="true"></i> <span>Users</span>        
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
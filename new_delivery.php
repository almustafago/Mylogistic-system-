<?php 
session_start();
$ucode = $_SESSION['u_id'];
$uname = $_SESSION['u_name'];
 $state = $_SESSION['status'];
  $code =  $_SESSION['u_val'];
  $pakage = $_SESSION['package'] ;
 $group = $_SESSION['group_id'];
$conn = mysqli_connect('localhost','root','','bolog2');

mysql_connect('localhost','root','');
	mysql_select_db('bolog2');
$selectAll = mysql_query("select * from delevery  where trackstate != 'Unassigened' ORDER BY o_no ASC");
	$selectNew = mysql_query("select * from delevery where o_state = 'New' AND trackstate = 'Unassigened' and code ='$code'");
	$selectPickup = mysql_query("select * from delevery where o_state = 'pickup' ");
	$selectProgress = mysql_query("select * from delevery where o_state = 'In Progress' ");
	$selectDelevery = mysql_query("select * from delevery where o_state = 'Deliver' ");
	$selectCancel = mysql_query("select * from delevery where o_state= 'Cancel'");
    $selectComplete = mysql_query("select * from delevery where trackstate = 'Completed'");
	
	if ($ucode == '3' or $code == '3'){
	$selectA = mysql_query("select * from delevery  where trackstate != 'Unassigened' and code ='$code'");}
	else {$selectA = mysql_query("select * from delevery  where  code ='$code'");}
	
	$lim = mysql_num_rows($selectA);
	if ($pakage == '0'){
		
		$orders = '50';
		
	}elseif($pakage == '1'){
		$orders = '250';
		
	}else {
		
		$orders = '5000';
		
	}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UTT Track | System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>U</b>TT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>UT</b>Track</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
               <?php  
                $query12 = "SELECT * FROM tbl_images where id = '$code' ";  
                $result21 = mysql_query( $query12);  
                while($row = mysql_fetch_array($result21))  
                {  
                     echo '  
                           
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" class="img-circle" alt="User Image" height ="20" />  
              
                     ';  
                }  
                ?> 
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $uname;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                 <?php  
                $query12 = "SELECT * FROM tbl_images where id = '$code' ";  
                $result21 = mysql_query( $query12);  
                while($row = mysql_fetch_array($result21))  
                {  
                     echo '  
                           
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" class="img-circle" alt="User Image" height ="20" />  
              
                     ';  
                }  
                ?> 

                <p>
                 <?php echo $uname;?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
          <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="dashboard.php">Dashboard</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="all_drivers.php">Drivers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="all_users.php">users</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
           <?php  
                $query12 = "SELECT * FROM tbl_images where id = '$code' ";  
                $result21 = mysql_query( $query12);  
                while($row = mysql_fetch_array($result21))  
                {  
                     echo '  
                           
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" class="img-circle" alt="User Image"  />  
              
                     ';  
                }  
                ?> 
        </div>
        <div class="pull-left info">
          <p><?php echo $uname;?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

       <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Navigation</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
            <a href="#"><i class="fa fa-th-large"></i> <span>Orders Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="all_orders.php">All Orders</a></li>
              <li><a href="new_orders.php">New Orders</a></li>
              <li><a href="completed_orders.php">Completed Orders</a></li>
              <li><a href="pickedup_orders.php">Picked-up Orders</a></li>
              <li><a href="cancelled_orders.php">Cancelled Orders</a></li>
            </ul>
          </li>
        <li><a href="send_orders.php"><i class="fa fa-send"></i> <span>Send Orders</span>
		<span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?php echo mysql_num_rows($selectNew);?></small>
              
             
            </span>
		
		</a></li> 
		<?php if ( $state == 0){echo'<li><a href="upload_orders.php"><i class="fa fa-paperclip"></i> <span>Upload Orders</span></a></li>
        <li><a href="new_delivery.php"><i class="fa fa-plus"></i> <span>Add New Delivery</span></a></li>';}?>
        <li class="treeview">
            <a href="#"><i class="fa fa-car"></i> <span>Drivers Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="all_drivers.php">All Drivers</a></li>
               <?php if ( $state == 0){echo'<li><a href="new_driver.php">Add New Driver</a></li>
            </ul>
          </li> <li class="treeview">
            <a href="#"><i class="fa fa-users"></i> <span>Users Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
			   <li><a href="all_users.php">All Users</a></li>';}
			   if($group == 1){echo'
              <li><a href="new_user.php">Add User</a></li>
			  </ul>
          </li>';}?>
		   <li> <a href="mylogo.php"><i class="glyphicon glyphicon-camera"></i><span>My Logo</span></a></li>
      </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          New Delivery
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">New Delivery</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add new delivery</h3>
                  </div>
              <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
            <div class="tile-body">
                
                <div class="form-group row">
                  <label class="control-label col-md-3">Reference</label>
                  <div class="col-md-8">
                    <input type="text" name="ref" value="" placeholder="Reference Code is Unique" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Parcel Type</label>
                  <div class="col-md-8">
                    <input type="text" name="type" id="type" placeholder="Parcel Type" class="form-control">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3">Order Location</label>
                  <div class="col-md-8" id="locationField">
                      
                      <input id="autocomplete" name="o_location" placeholder="Enter your address"
                      onFocus="geolocate()" type="text" class="form-control" required>
                   
                    
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3">City</label>
                  <div class="col-md-8">
                    <input type="text" name="city" id="locality" placeholder="City" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Order Pieces</label>
                  <div class="col-md-8">
                    <input type="text" name="o_pic" id="o_pic" placeholder="Order Pieces" class="form-control">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="control-label col-md-3">Customer Name</label>
                  <div class="col-md-8">
                    <input type="text" name="c_name" placeholder="Customer Name" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Customer Phone*</label>
                  <div class="col-md-8">
                    <input type="number" name="c_phone" placeholder="Customer Phone*" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Customer Email</label>
                  <div class="col-md-8">
                    <input type="email" name="email" placeholder="Customer Email" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Order Price</label>
                  <div class="col-md-8">
                    <input type="number" name="o_price" placeholder="Order Price" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Order State</label>
                  <div class="col-md-8">
                    <input type="text" name="o_state" placeholder="Order State" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Send Date</label>
                  <div class="col-md-8">
                    <input type="date" name="send_date" placeholder="Send Date" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Delivery Price</label>
                  <div class="col-md-8">
                    <input type="text" name="d_price" id="d_price" placeholder="Delivery Price" class="form-control">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3">Shipping Fees Pay</label>
                  <div class="col-md-8">
                    <input type="text" name="shipping_fees_pay" id="shipping_fees_pay" placeholder="Shipping Fees Pay" class="form-control">
                  </div>
                </div>

                <div class="form-group row"> 
                  <label class="control-label col-md-3">Order Fees Collect</label>
                  <div class="col-md-8">
                    <input type="text" name="order_fees_collect" id="order_fees_collect" placeholder="Order Fees Collect" class="form-control">
                  </div>
                </div>

                 <div class="form-group row"> 
                  <label class="control-label col-md-3">Collection</label>
                  <div class="col-md-8">
                    <input type="text" name="collection" id="collection" placeholder="Collection" class="form-control">
                  </div>
                </div>

                <div class="form-group row"> 
                  <label class="control-label col-md-3">Payment Method</label>
                  <div class="col-md-8">
                    <SELECT type="text" name="pay_method" class="form-control">
                      <option>Paypal</option>
                      <option>Credit Card</option>
                      <option>Debid Card</option>
                      <option>Cash</option>
                    </SELECT>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3">Driver Zone</label>
                  <div class="col-md-8">
                    <SELECT type="text" name="code" id="code" placeholder="Code" class="form-control">
                      <option value="">Select Zone</option>
                      <option value="1">Zone 1</option>
                      <option value="2">Zone 2</option>
                      <option value="3">Zone 3</option>
                      <option value="4">Zone 4</option>
                    </SELECT>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Weight</label>
                  <div class="col-md-8">
                    <input type="text" name="weight" id="weight" placeholder="Weight" class="form-control">
                  </div>
                </div>
               
               <div class="form-group row">
                  <label class="control-label col-md-3">Order Details</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="4" name="o_details" placeholder="Enter your address"></textarea>
                  </div>
                </div>

                <div class="form-group row" hidden>
                  <label class="control-label col-md-3">Latitude</label>
                  <div class="col-md-8">
                    <input class="form-control"  name="latitude" placeholder="Enter your latitude">
                  </div>
                </div>

                <div class="form-group row" hidden>
                  <label class="control-label col-md-3">Longitude</label>
                  <div class="col-md-8">
                    <input type="" class="form-control"  name="longitude" placeholder="Enter your Longitude">
                  </div>
                </div>
               
                <div class="form-group row">
                  <label class="control-label col-md-3">Fast deliver</label>
                  <div class="col-md-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" checked="" value="Yes" name="fastdeliver">Yes
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="No" name="fastdeliver">NO
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input type="file" class="form-control" name="image" accept=".png, .jpg, jpeg">
                  </div>
                </div> 
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                 <?php if ($lim <= $orders){ echo'<button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg"></i>Submit Order</button>';}
				 else{echo "<p class='btn btn-primary bg-red'>You dont have limit to add orders</p>";}
				 ?>
                </div>
              </div>
            </div>
            </form>

                </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="https://www.uttrack.com">Uttrack</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
 <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
<!-- CSS effects-->
<style>
  .info-box {
  position: relative;
  display: inline-block;
  box-shadow: 0 1px 2px rgba(0,0,0,0.15);
  transition: all 0.3s ease-in-out;
  }

.info-box::after {
  content: '';
  position: absolute;
  z-index: -1;
  opacity: 0;
  border-radius: 5px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.3);
  transition: opacity 0.3s ease-in-out;
}

.info-box:hover {
  transform: scale(1.2, 1.2);
}

/* Fade in the pseudo-element with the bigger shadow */
.info-box:hover::after {
  opacity: 1;
}

</style>
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- page script -->

<script>
  $(function () {

    // Script for datatables features-->
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>

<?php 


if(isset($_POST['submit'])){

$ref = mysqli_escape_string($conn, $_POST['ref']); 

//$o_location = mysqli_escape_string($conn, $_POST['o_location']); 
$city = mysqli_escape_string($conn, $_POST['city']);
$send_date = mysqli_escape_string($conn, $_POST['send_date']); 
$o_pic = mysqli_escape_string($conn, $_POST['o_pic']); 
 
$c_phone = mysqli_escape_string($conn, $_POST['c_phone']); 
$email = mysqli_escape_string($conn, $_POST['email']); 
$o_price = mysqli_escape_string($conn, $_POST['o_price']); 
$o_state = mysqli_escape_string($conn, $_POST['o_state']);  
$d_price = mysqli_escape_string($conn, $_POST['d_price']); 
$order_fees_collect = mysqli_escape_string($conn, $_POST['order_fees_collect']); 
$shipping_fees_pay = mysqli_escape_string($conn, $_POST['shipping_fees_pay']); 
$creat_date = date('Y-m-d h:i:s'); 
$code = mysqli_escape_string($conn, $ucode);  
$collection = mysqli_escape_string($conn, $_POST['collection']);  
$weight = mysqli_escape_string($conn, $_POST['weight']); 
$fastdeliver = mysqli_escape_string($conn, $_POST['fastdeliver']);

$o_details1 = mysqli_escape_string($conn, $_POST['o_details']);
$type1 = mysqli_escape_string($conn, $_POST['type']); 
$c_name1 = mysqli_escape_string($conn, $_POST['c_name']);
$o_state1 = mysqli_escape_string($conn, $_POST['o_state']);
$o_location1 = mysqli_escape_string($conn, $_POST['o_location']);

$o_details_ar = trim(translate($o_details1));
$type_ar = trim(translate($type1));
$c_name_ar = trim(translate($c_name1));
$o_state_ar = trim(translate($o_state1));
$o_location_ar = trim(translate($o_location1));

//latlong finder

$o_details = trim(translate1($o_details1));
$type = trim(translate1($type1));
$c_name = trim(translate1($c_name1));
$o_state = trim(translate1($o_state1));
$o_location = trim(translate1($o_location1));

$url = "http://maps.google.com/maps/api/geocode/json?address=".urlencode($o_location1);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
$responseJson = curl_exec($ch);
curl_close($ch);

$response = json_decode($responseJson);

if ($response->status == 'OK') {
    $latitude = $response->results[0]->geometry->location->lat;
    $longitude = $response->results[0]->geometry->location->lng;

} else {
    echo $response->status;
    var_dump($response);
} 



    if(!empty($_FILES['image']))
    {
    $filetmp = $_FILES['image']["tmp_name"];
    $image = $_FILES['image']["name"];
    $image = time().$image;
    $filetype = $_FILES['image']["type"];
    $dir = "../profile_image/".$image;
    move_uploaded_file($filetmp,$dir);
    }
    else
    {
      $image = '';
    }

 $sql="INSERT INTO delevery(ref, type, o_location, city, send_date, o_pic, c_name, c_phone, email, o_price, o_state, trackstate, d_price, order_fees_collect,
 shipping_fees_pay, creat_date, code, collection, weight, fastdeliver, image, o_details, latitude, longitude, o_details_ar,   type_ar, c_name_ar, o_state_ar, o_location_ar)
 VALUES ('$ref', '$type', '$o_location1', '$city', '$send_date', '$o_pic', '$c_name1', '$c_phone', '$email', '$o_price', 'New', 'Unassigened', '$d_price', 
 '$order_fees_collect', '$shipping_fees_pay', '$creat_date', '$code', '$collection', '$weight', '$fastdeliver', '$image', '$o_details', '$latitude', '$longitude', '$o_details_ar', '$type_ar', '$c_name_ar', '$o_state_ar', '$o_location_ar')";

    if(mysqli_query($conn, $sql))
    {

      $last_id = mysqli_insert_id($conn);
      echo "<script>alert('data Send successfully $last_id');window.location='new_delivery.php'</script>";       
    }
    else
    {
      //echo "Error: " . $sql . "<br>" . $conn->error;
   echo "<script>alert('data insert failled');window.location='new_delivery.php'</script>";
    }
}

function translate($txt)
 {
   $text = str_replace(" ","%20",$txt);

    $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://translation.googleapis.com/language/translate/v2/?q='".$text."'&source=en&target=ar&key=AIzaSyCuiZz0KqxBBAV-aWOv3h93-ssDJ82xd3w",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "email=vinod%40gmail.com&old_password=1234&new_password=12345",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 29848228-5982-4bfe-a160-2f3d3f2fe1e5"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err)
    {
      echo "cURL Error #:" . $err;
    }
    else 
    {  
        $res = json_decode($response,true);
        $new_res = $res[data][translations][0][translatedText];
        $text4 = str_replace("&#39;"," ",$new_res);
        return $text3 = str_replace("&quot;"," ",$text4);
    }

 }

 function translate1($txt)
 {
   $text = str_replace(" ","%20",$txt);

    $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://translation.googleapis.com/language/translate/v2/?q='".$text."'&source=ar&target=en&key=AIzaSyCuiZz0KqxBBAV-aWOv3h93-ssDJ82xd3w",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "email=vinod%40gmail.com&old_password=1234&new_password=12345",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 29848228-5982-4bfe-a160-2f3d3f2fe1e5"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err)
    {
      echo "cURL Error #:" . $err;
    }
    else 
    {  
        $res = json_decode($response,true);
        $new_res = $res[data][translations][0][translatedText];
        $text4 = str_replace("&#39;"," ",$new_res);
        return $text3 = str_replace("&quot;"," ",$text4);
    }

 }

?>
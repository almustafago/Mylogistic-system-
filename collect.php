<?php 
session_start();
$ucode = $_SESSION['u_id'];
$uname = $_SESSION['u_name'];
 $state = $_SESSION['status'];
  $code =  $_SESSION['u_val'];
 $group = $_SESSION['group_id'];

if($uname == '' AND $ucode == ''){
	
	
	header("Refresh: 0 ; url=login.php");
}
mysql_connect('localhost','root','');
	mysql_select_db('bolog2');

if ($ucode == '3' or $code == '3'){
	$selectAll = mysql_query("select * from delevery  where trackstate != 'Unassigened' and code ='$code'");}
	else {$selectAll = mysql_query("select * from delevery  where  code ='$code'");}
	$selectNew = mysql_query("select * from delevery where o_state = 'New' AND trackstate = 'Unassigened'  AND code ='$code'");
	$selectPickup = mysql_query("select * from delevery where o_state = 'pickup'  AND code ='$code'");
	$selectProgress = mysql_query("select * from delevery where o_state = 'In Progress'  AND code ='$code'");
	$selectDelevery = mysql_query("select * from delevery where o_state = 'Deliver'  AND code ='$code'");
	$selectCancel = mysql_query("select * from delevery where (o_state= 'Cancel' or trackstate = 'Failed')  AND code ='$code'");
    $selectComplete = mysql_query("select * from delevery where trackstate = 'Completed'  AND code ='$code'");
/*
$selectAll1 = mysql_query("select * from delevery where code = '$ucode' ");
	$selectNew1 = mysql_query("select * from delevery where o_state = 'New' AND code = '$ucode'");
	$selectPickup1 = mysql_query("select * from delevery where o_state = 'pickup' AND code = '$ucode'");
	$selectProgress1 = mysql_query("select * from delevery where o_state = 'In Progress' AND code = '$ucode'");
	$selectDelevery1 = mysql_query("select * from delevery where o_state = 'Deliver' AND code = '$ucode'");
	$selectCancel1 = mysql_query("select * from delevery where o_state = 'Failed' AND code = '$ucode'");
         $selectComplete1 = mysql_query("select * from delevery where trackstate = 'Completed' AND code = '$ucode'");*/

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
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
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
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php  echo $uname;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php  echo $uname;?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
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
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php  echo $uname;?></p>
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
        <li ><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
            <a href="#"><i class="fa fa-th-large"></i> <span>Orders Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="all_orders.php">All Orders</a></li>
               <?php if ($state == 0  and $group <= 3){echo'<li><a href="new_orders.php">New Orders</a></li>';}?>
              <li class="active"><a href="completed_orders.php">Completed Orders</a></li>
               <?php if ($state == 0  and $group <= 3){echo'<li><a href="pickedup_orders.php">Picked-up Orders</a></li>
              <li><a href="cancelled_orders.php">Cancelled Orders</a></li>
            </ul>
          </li>
        <li><a href="send_orders.php"><i class="fa fa-send"></i> <span>Send Orders</span>
		<span class="pull-right-container">
              <small class="label pull-right bg-yellow">'.mysql_num_rows($selectNew).'</small>
              
             
            </span>
			   </a></li>';}?>
         <?php if ( $state == 0 and $group <= 3){echo'<li><a href="upload_orders.php"><i class="fa fa-paperclip"></i> <span>Upload Orders</span></a></li>
        <li><a href="new_delivery.php"><i class="fa fa-plus"></i> <span>Add New Delivery</span></a></li>
        <li class="treeview">
            <a href="#"><i class="fa fa-car"></i> <span>Drivers Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="all_drivers.php">All Drivers</a></li>';}?>
               <?php if ( $state == 0 and $group <= 3){echo'<li><a href="new_driver.php">Add New Driver</a></li>
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
          Orders Management        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="all_orders.php"><i></i> Orders Management</a></li>
            <li class="active">All Orders</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="all_orders.php" style="color:darkslategray">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-cubes"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">All Orders</span>
                <span class="info-box-number"><?php  echo mysql_num_rows($selectAll); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="new_orders.php" style="color:darkslategray" >
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fa fa-plus"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">New Orders</span>
                <span class="info-box-number"><?php  echo mysql_num_rows($selectNew); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>
          </div>
          <!-- /.col -->
  
          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>
  
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="completed_orders.php" style="color:darkslategray">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa  fa-check-circle"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Completed Orders</span>
                <span class="info-box-number"><?php  echo mysql_num_rows($selectComplete); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="cancelled_orders.php" style="color:darkslategray">
            <div class="info-box" >
              <span class="info-box-icon bg-red"><i class="fa fa-close"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Cancelled Orders</span>
                <span class="info-box-number"><?php  echo mysql_num_rows($selectCancel); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
              </a>
          </div>
          <!-- /.col -->
        </div>
          <!-- /.row -->
          
        <div class="row">
          <div class="col-xs-12">
              <div class="box">
                  <div class="box-header">
                    <h3 class="box-title"> Collect order Fees</h3>
					<div class="progress progress-sm active">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                  <span class="sr-only">80% Complete</span>
                </div>
              </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive">
                   <?php 

//include"config.php";
//include"file/header.php";

if( isset($_GET['collect']) )
	{
		$id = $_GET['collect'];
		$sql= mysql_query("UPDATE delevery SET   collection = 'collected' where  o_no ='$id'");
		if(isset($sql)){
			//echo "<div class ='success'>Collect Succsess</div>";
			
		}
	}

header("Refresh:1; url=completed_orders.php");

?>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
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
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
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

    $('select#engines').change( function() { oTable.fnFilter( $(this).val() ); } );
  })
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
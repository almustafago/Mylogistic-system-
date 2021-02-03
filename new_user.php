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
$selectAll = mysql_query("select * from delevery  where trackstate != 'Unassigened' ORDER BY o_no ASC");
	$selectNew = mysql_query("select * from delevery where o_state = 'New' AND trackstate = 'Unassigened' and code = '$code'");
	$selectPickup = mysql_query("select * from delevery where o_state = 'pickup' ");
	$selectProgress = mysql_query("select * from delevery where o_state = 'In Progress' ");
	$selectDelevery = mysql_query("select * from delevery where o_state = 'Deliver' ");
	$selectCancel = mysql_query("select * from delevery where o_state= 'Cancel'");
    $selectComplete = mysql_query("select * from delevery where trackstate = 'Completed'");


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
              <small class="label pull-right bg-yellow"><?php  echo mysql_num_rows($selectNew); ?></small>
              
             
            </span>
		
		</a></li>
        <li><a href="upload_orders.php"><i class="fa fa-paperclip"></i> <span>Upload Orders</span></a></li>
        <li><a href="new_delivery.php"><i class="fa fa-plus"></i> <span>Add New Delivery</span></a></li>
        <li class="treeview">
            <a href="#"><i class="fa fa-car"></i> <span>Drivers Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="all_drivers.php">All Drivers</a></li>
              <li><a href="new_driver.php">Add Driver</a></li>
            </ul>
          </li>       
	   <li class="treeview">
            <a href="#"><i class="fa fa-car"></i> <span>Users Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="all_users.php">All Users</a></li>
              <li><a href="new_user.php">Add User</a></li>
            </ul>
			 <li> <a href="mylogo.php"><i class="glyphicon glyphicon-camera"></i><span>My Logo</span></a></li>
          </li>
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
          New Driver
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">New Driver</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
        <section class="content">
        <div class="row">
          <div class="col-xs-12">
              <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Add New user</h3>
          
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body">
                   
                     <form class="form-horizontal" action="#" method="post">
                      <div class="tile-body">
                          
                          <div class="form-group row">
                            <label class="control-label col-md-3">Name*</label>
                            <div class="col-md-8">
                              <input type="text" name="u_name" placeholder="Name" class="form-control" required="">
                            </div>
                          </div>
                            <div class="form-group row">
                            <label class="control-label col-md-3">Password*</label>
                            <div class="col-md-8">
                              <input type="text" name="u_pass" placeholder="password" class="form-control" required="">
                            </div>
                          </div>
                          
          
                          <div class="form-group row">
                            <label class="control-label col-md-3">Email*</label>
                            <div class="col-md-8">
                              <input type="text" name="u_email" placeholder="Email" class="form-control" required="">
                            </div>
                          </div>
                           <div class="form-group row">
                            <label class="control-label col-md-3">Phone*</label>
                            <div class="col-md-8">
                              <input type="text" name="phone" placeholder="Phone" class="form-control" required="">
                            </div>
                          </div>
						   <div class="form-group row">
                            <label class="control-label col-md-3">User Group</label>
                         <select  class='btn btn-primary bg-green' name="ind" >

               
			   <option value="2"> Super </option>
			   <option value="3"> Operator </option>
			   <option value="4"> Finaancial </option>
   </select>
   </div>
                          <div class="form-group row">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-8">
                              <input type="submit" name="registerdo" class=" btn btn-primary" value="Add User">
                            </div>
                          </div>
                  <!-- /.box-footer-->
                </div>
              </form>
                <!-- /.box -->
          
              </div>
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

if(isset($_POST['registerdo']))
{
$conn = mysqli_connect('localhost', 'root', '', 'bolog2');
  $u_name1 = $_POST['u_name'];
  $u_pass = $_POST['u_pass'];
  $u_email = $_POST['u_email'];
   $groop = $_POST['ind'];
  $u_val = 2;
  $phone = $_POST['phone'];
  $u_name = trim(translate1($u_name1));
  $u_name_ar = trim(translate($u_name1));

  if($u_name1==null || $u_pass==null || $u_email==null)
  {
    echo "<script>alert('Check Input fields');</script>";   
  }
  else
  {
      $sql = mysqli_query($conn, "SELECT u_email FROM user WHERE u_email = '$u_email'");
      if(mysqli_num_rows($sql)>0)
      {            
        echo "<script>alert('Email already Register');</script>";
      }
      else
      {  if($ucode == $code){
              
         $sql1 = mysqli_query($conn, "INSERT INTO user(u_name, u_pass, u_email, u_mobile, u_val, group_id) VALUES ('$u_name1', '$u_pass', '$u_email', '$phone', '$ucode', '$groop')");
        
          if($sql1)
          {
             echo "<script>alert('Register successfully');window.location='all_users.php';</script>";
          }
          else
          {
            echo "<script>alert('Query Error');</script>";
          }
      } else{
		  
		  $sql1 = mysqli_query($conn, "INSERT INTO user(u_name, u_pass, u_email, u_mobile, u_val) VALUES ('$u_name1', '$u_pass', '$u_email', '$phone', '$code')");
        
          if($sql1)
          {
             echo "<script>alert('Register successfully');window.location='all_users.php';</script>";
          }
          else
          {
            echo "<script>alert('Query Error');</script>";
          }
		  
		  
	  }
	  }
  } 
}

// function Start
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
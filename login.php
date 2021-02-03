
<?php

session_start();
include "config.php";
//TODO: do not hardcode, get from database
//const login = 'admin';
//const password = 'admin';


if (isset($_POST['log'])) //when form submitted
{
 $u_name= strip_tags($_POST['login']);
 $u_pass= $_POST['password'];
	$sqlquery = mysql_query("select * from user where  u_pass = '".$u_pass."' and u_email = '".$u_name."' ") or die(mysql_error());
		//$count = mysql_num_rows($sqlquery);
		if (count($sqlquery) > 0 ){
			
			//refresh("index.php", 4);
			$fecthLquery = mysql_fetch_assoc($sqlquery);
			
			$u_id= $fecthLquery['u_id'];
			$uname1 = $fecthLquery['u_email'];
			$uname = $fecthLquery['u_name'];
			$upass = $fecthLquery['u_pass'];
			$code = $fecthLquery['u_val'];
			$pakage = $fecthLquery['package'];
			$state = $fecthLquery['status'];
			$group = $fecthLquery['group_id'];
			echo $code;
  if ($u_name === $uname1 && $u_pass === $upass)
  {
    $_SESSION['login'] = $_POST['login']; //write login to server storage
	$_SESSION['u_id'] = $u_id;
	$_SESSION['u_name'] = $uname;
	$_SESSION['u_val'] = $code;
	$_SESSION['status'] = $state;
	$_SESSION['package'] = $pakage;
	$_SESSION['group_id'] = $group;
    header('Location: dashboard.php'); //redirect to main
  }
  else
  {
    echo "<script>alert('Wrong login or password');</script>";
    echo "<noscript>Wrong login or password</noscript>";
  }
		}
			
}



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UTT Track | System :: Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="dashboard.php"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

     <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control"  name="login">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type = "submit" value ="Sign In" name="log"class="btn btn-primary btn-block btn-flat" />
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!--<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

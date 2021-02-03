<?php 
session_start();
$ucode = $_SESSION['u_id'];
$uname = $_SESSION['login'];
 
 mysql_connect('localhost','root','');
	mysql_select_db('bolog2');
$selectuser = mysql_query("select * from user where u_val='0'");
   if (mysql_num_rows($selectuser)> 0) {
                      while ($rowu = mysql_fetch_assoc($selectuser)) {
						  $order_state = $rowu['u_id'];
						  
						  mysql_query("update user set u_val = '$order_state' where u_id = '$order_state'");
						  
					  }
					  
   }
//echo "DOne";
header("Refresh: 0 ; url=admin_page.php");
?>
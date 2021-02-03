<?php 
session_start();
$ucode = $_SESSION['u_id'];
$uname = $_SESSION['login'];
header('Content-Type: text/html; charset=utf-8'); 
 //export.php  
 if(!empty($_FILES["excel_file"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "bolog");  
    //  mysqli_set_charset('utf8', $connect);
    // mysqli_query("SET NAMES 'utf8_general_ci'");
    // mysqli_query('SET CHARACTER SET utf8_general_ci');
      

      $file_array = explode(".", $_FILES["excel_file"]["name"]);  
      if($file_array[1] == "xlsx")  
      {  
           include("PHPExcel/IOFactory.php");  
           $output = '';  
           $output .= "  
           <label class='text-success'>Data Inserted</label>  
                <table class='table table-bordered'>  
                     <tr>  
                          <th>Refreance</th>  
						  <th>Type</th>  
                          <th>Address</th>  
                          <th>City</th>  
                          
						     						  
                     </tr>  
                     ";  
           $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);  
           foreach($object->getWorksheetIterator() as $worksheet)  
           {  
                $highestRow = $worksheet->getHighestRow();  
                for($row=2; $row<=$highestRow; $row++)  
                {  
                     $name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
                     $address = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
                     $city = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
                     $postal_code = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());  
                    // $country = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
					// $c_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
					 /*$c_phone = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
					 $email = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
					 $price = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
					 $driver = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
                     $state = "New";*/
                  // if (strlen($c_name) >= 7 ){					 
                     $query = "  
                     INSERT INTO customer  
                     (email,first_name,last_name,username)  
                     VALUES ('".$name."', '".$address."', '".$city."', '".$postal_code."')  
                     ";  
					 mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
                     mysqli_query($connect, $query);  
                     $output .= '  
                     <tr>  
                          <td>'.$name.'</td>  
                          <td>'.$address.'</td>  
                          <td>'.$city.'</td>  
                          <td>'.$postal_code.'</td>  
                         
                         					  
                     </tr>  
                     ';  
				   //} 
                }  
           }  
           $output .= '</table>';  
           echo $output;  
      }  
      else  
      {  
           echo '<label class="text-danger">Invalid File</label>';  
      } 
 }	  
 ?>  
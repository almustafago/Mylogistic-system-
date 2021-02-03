<?php 
session_start();
$ucode = '3';
//$uname = $_SESSION['login'];
header('Content-Type: text/html; charset=utf-8'); 
 //export.php  
 if(!empty($_FILES["excel_file"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "bolog2");  
     mysqli_query($connect,"set character_set_server='utf8'");
     mysqli_query($connect,"set names 'utf8'");  
      

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
                          <th>pice number</th>  
                          <th>customer name</th>  
						  <th>Phone</th>  
						  <th>Email</th>
                          <th>Price</th> 
                          <th>State</th>
                          <th>Driver</th>     						  
                     </tr>  
                     ";  
           $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);  
           foreach($object->getWorksheetIterator() as $worksheet)  
           {  
                $highestRow = $worksheet->getHighestRow();  
                for($row=2; $row<=$highestRow; $row++)  
                {  
                     $name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
                     $address = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
                     $city = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());  
                     $postal_code = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());  
                     $country = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
					 $c_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
					 $c_phone = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
					 $email = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
					 $price = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
					 $driver = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
                                         $weight = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
                                         $install = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
                                         $fast = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());

                     $state = "New";
                   if (strlen($c_phone) >= 9 && strlen($address) >= 3 && strlen($city) >= 3 && strlen($price ) >= 1){					 
                     $query = "  
                     INSERT INTO delevery  
                     (ref,type,o_location,city,o_pic,c_name,c_phone,email,o_price,o_state,driver,trackstate,code,weight,install_fees,fastdeliver)  
                     VALUES ('".$name."', '".$address."', '".$city."', '".$postal_code."', '".$country."', '".$c_name."', '".$c_phone."', '".$email."', '".$price."', 'New', '', 'Unassigened', '".$ucode."', '".$weight."', '".$install."', '".$fast."')  
                     ";  
                     mysqli_query($connect, $query);
                    //mysqli_query("set character_set_server='utf8'");
                    //mysqli_query("set names 'utf8'");  
                     $output .= '  
                     <tr>  
                          <td>'.$name.'</td>  
                          <td>'.$address.'</td>  
                          <td>'.$city.'</td>  
                          <td>'.$postal_code.'</td>  
                          <td>'.$country.'</td>
                           <td>'.$c_name.'</td>  
                          <td>'.$c_phone.'</td>  
                          <td>'.$email.'</td>  
                          <td>'.$price.'</td>  
                          <td>'.$state.'</td> 
                          <td>'.$driver.'</td> 
                          <td>'.$weight.'</td>  
                          <td>'.$install.'</td> 
                          <td>'.$fast.'</td>						  
                     </tr>  
                     ';  
				   } else{
					   
					   echo "<script type=\"text/javascript\">
							alert(\"Invalid phone number or wrong refrance Or there is feild empty.\");
							window.location = \"page1.php\"
						</script>";
 
				   }
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
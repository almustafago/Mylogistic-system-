<?Php
$host_name = "localhost";
$database = "bolog2"; // Change your database nae
$username = "root";          // Your database user id 
$password = "";          // Your password

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
mb_language('uni');
mb_internal_encoding('UTF-8');
mysqli_query( $dbo,"SET character_set_results=utf8");
mysqli_query( $dbo,"SET character_set_server=utf8");
mysqli_query( $dbo,"SET character_set_database=utf8");
mysqli_query( $dbo,"set names 'utf8'");
}
?>
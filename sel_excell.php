<?php
$conn = mysqli_connect("localhost", "root", "", "bolog2");
$deleteCb = $_POST['deleteCb'];

$filename = "utt.csv";
$fp = fopen('php://output', 'w');

$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='bolog' AND TABLE_NAME='delevery'";
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_row($result)) {
	$header[] = $row[0];
}	

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);
for($i=0; $i<count($deleteCb); $i++){
	$news_id = $deleteCb[$i];
$query = "SELECT * FROM delevery where o_no = '$news_id'";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_row($result)) {
	fputcsv($fp, $row);
}
}
exit;

?>
<?php

include 'Admin/conn.php';

$search_term = $_POST['hospital'];

$sql = "SELECT FROM addhospital WHERE hospital LIKE '%{$search_term}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

$output = "<ul>";

	if(mysqli_num_rows($result) > 0){  
		while($row = mysqli_fetch_assoc($result)){
			$output .= "<li>{$row['hospital']}</li>";
		}
  }else{  
  	$output .= "<li>City Not Found</li>";
  } 
$output .= "</ul>";

echo $output;

?>
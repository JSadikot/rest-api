<?php
header('Content-Type: application/json');
header('Access-Control-Allow--Origin: *');
include "config.php";

$data = json_decode(file_get_contents("php://input"), true); // This will give array of contents in json form
$search_value = $data['search']; 
$sql = "SELECT * FROM student WHERE name LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL query failed");

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array('message'=> 'No Search Found', 'status'=> false));
}
?>

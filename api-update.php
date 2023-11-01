<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');
include "config.php";

$data = json_decode(file_get_contents("php://input"), true); // This will give array of contents in json form
$student_id = $data['sid']; //sid will be sent from user side in json form
$student_name = $data['sname']; //sid will be sent from user side in json form
$student_age = $data['sage']; //sid will be sent from user side in json form
$student_city = $data['scity']; //sid will be sent from user side in json form
$sql = "UPDATE student SET name ='{$student_name}', age ={$student_age}, city ='{$student_city}' WHERE id ={$student_id}";

if(mysqli_query($conn, $sql)){
    echo json_encode(array('message'=> 'Student Record Updated', 'status'=> true));
}else{
    echo json_encode(array('message'=> 'Student Record Not Updated', 'status'=> false));
}
?>

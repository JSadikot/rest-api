<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');
include "config.php";

$data = json_decode(file_get_contents("php://input"), true); // This will give array of contents in json form
$student_id = $data['sid']; //sid will be sent from user side in json form
$student_name = $data['sname']; //sid will be sent from user side in json form
$student_age = $data['sage']; //sid will be sent from user side in json form
$student_city = $data['scity']; //sid will be sent from user side in json form
$sql = "INSERT INTO student(id, name, age, city) VALUES ({$student_id},'{$student_name}',{$student_age},'{$student_city}')";

if(mysqli_query($conn, $sql)){
    echo json_encode(array('message'=> 'Student Record Inserted', 'status'=> true));
}else{
    echo json_encode(array('message'=> 'Student Record Not Inserted', 'status'=> false));
}
?>

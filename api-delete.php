<?php
header('Content-Type: application/json');
header('Access-Control-Allow--Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');
include "config.php";

$data = json_decode(file_get_contents("php://input"), true); // This will give array of contents in json form
$student_id = $data['sid']; //sid will be sent from user side in json form
$sql = "DELETE FROM student WHERE id = {$student_id}";


if(mysqli_query($conn, $sql)){
    echo json_encode(array('message'=> 'Record Deleted', 'status'=> true));
}else{
    echo json_encode(array('message'=> 'No Record Deleted', 'status'=> false));
}
?>

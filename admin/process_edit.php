<?php
$emp_id = $_GET['id'];
$emp_name = $_POST['empName'];
$emp_position = $_POST['empPosition'];
$emp_email = $_POST['empEmail'];
$emp_mobile = $_POST['empMobile'];
$office_id = $_POST['office'];

//?mở kết nối
include '../config/constants.php';

//? set câu lệnh
$sql = "UPDATE db_employees SET emp_name='$emp_name', emp_position='$emp_position', emp_email='$emp_email', emp_mobile='$emp_mobile', office_id='$office_id' WHERE emp_id = $emp_id";

//? kiểm tra và thực thi câu lệnh
if (mysqli_query($conn, $sql)) {
    header('location:index.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

//? đóng kết nối

mysqli_close($conn);

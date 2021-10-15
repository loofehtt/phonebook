<?php
$emp_name = $_POST['empName'];
$emp_position = $_POST['empPosition'];
$emp_email = $_POST['empEmail'];
$emp_mobile = $_POST['empMobile'];
$office_id = $_POST['office'];

//? mở kết nối
include '../config/constants.php';

//? câu lệnh
$sql = "INSERT INTO db_employees (emp_name, emp_position, emp_email, emp_mobile, office_id)
    VALUES ('$emp_name','$emp_position','$emp_email','$emp_mobile','$office_id')";

//? kiểm tra và thực thi lệnh
$result = mysqli_query($conn, $sql);
if ($result > 0) {
    header('location:index.php');
} else {
    echo 'Error';
}

//? đóng kết nối
mysqli_close($conn);

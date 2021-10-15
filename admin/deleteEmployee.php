<?php
$emp_id = $_GET['id'];

//?mở kết nối
include '../config/constants.php';

//? set câu lệnh truy vấn
$sql = "DELETE FROM db_employees WHERE emp_id='$emp_id'";

//? kiểm tra và thực thi câu lệnh
if (mysqli_query($conn, $sql)) {
    header('location:index.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

//? đóng kết nối
mysqli_close($conn);

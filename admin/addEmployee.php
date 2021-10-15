<?php
include '../header.php';
include '../config/constants.php';
?>

<main class="container mt-5">
    <h2>Thêm thông tin nhân viên</h2>
    <form action="process_add.php" method="post">
        <div class="form-group row">
            <label for="empName" class="col-sm-2 col-form-label">Tên nhân viên:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="empName" name="empName">
            </div>
        </div>
        <div class="form-group row">
            <label for="empPosition" class="col-sm-2 col-form-label">Chức vụ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="empPosition" name="empPosition">
            </div>
        </div>
        <div class="form-group row">
            <label for="empEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="empEmail" name="empEmail">
            </div>
        </div>
        <div class="form-group row">
            <label for="empMobile" class="col-sm-2 col-form-label">Số di động</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" id="empMobile" name="empMobile">
            </div>
        </div>

        <div class="form-group row">
            <label for="empOffice" class="col-sm-2 col-form-label">Tên cơ quan</label>
            <div class="col-sm-10">
                <select name="office" id="office">
                    <?php
                    $sql = "SELECT * FROM db_offices";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['office_id'] . '">' . $row['office_name'] . '</option>';
                        }
                    }
                    //? đóng kết nối
                    mysqli_close($conn);
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="saveBtn" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-success">Lưu lại</button>
            </div>
        </div>

    </form>
</main>
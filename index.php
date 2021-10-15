<?php include './header.php' ?>
<form class="row g-3" action="search.php" method="post">
    <div class="col-auto">
        <input type="text" class="form-control" name="text-search" placeholder="Finding something?">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3" name="submit-search">Search</button>
    </div>
</form>

<table class="table table-responsive">
    <thead>
        <tr>
            <th scope="col">Mã NV</th>
            <th scope="col">Họ Tên</th>
            <th scope="col">Chức Vụ</th>
            <th scope="col">Email</th>
            <th scope="col">SĐT</th>
            <th scope="col">Cơ Quan</th>
        </tr>
    </thead>
    <tbody>
        <!--xuất dữ liệu theo CSDL -->
        <?php
        //* B1: mở kết nối
        include './config/constants.php';
        //* B2: Truy vấn
        $sql = "SELECT emp_id, emp_name, emp_position, emp_email, emp_mobile, office_name FROM db_employees, db_offices WHERE db_employees.office_id = db_offices.office_id";

        //? lưu kết quả trả về $result
        $result = mysqli_query($conn, $sql);

        //* B3: Phân tích sử lý kết quả
        if (mysqli_num_rows($result) > 0) :
            while ($row = mysqli_fetch_assoc($result)) :
        ?>
                <tr>
                    <th scope="row"><?php echo $row['emp_id']; ?></th>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['emp_position']; ?></td>
                    <td><?php echo $row['emp_email']; ?></td>
                    <td><?php echo $row['emp_mobile']; ?></td>
                    <td><?php echo $row['office_name']; ?></td>
                </tr>
        <?php
            endwhile;
        endif;
        //* B4: đóng kết nối
        mysqli_close($conn);
        ?>
    </tbody>
</table>
<?php include './footer.php' ?>
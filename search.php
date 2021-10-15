<?php include './header.php'; ?>
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
        <!-- xuất dữ liệu theo CSDL -->
        <?php
        if (isset($_POST['submit-search'])) :
            //* B1: mở kết nối
            include './config/constants.php';

            //* B2: Truy vấn

            //? lọc kí tự đặc biệt trong từ tìm kiếm 
            $search = mysqli_escape_string($conn, $_POST['text-search']);

            //? câu lệnh truy vấn
            $sql = "SELECT emp_id, emp_name, emp_position, emp_email, emp_mobile, office_name FROM db_employees, db_offices 
            WHERE db_employees.office_id = db_offices.office_id 
            AND (emp_id LIKE '%$search%' OR emp_name LIKE '%$search%' OR emp_position LIKE '%$search%' OR emp_mobile LIKE '%$search%' OR office_name LIKE '%$search%') ";

            //?lưu kết quả trả về $result
            $result = mysqli_query($conn, $sql);

            //* B3: Phân tích sử lý kết quả
            if (mysqli_num_rows($result) > 0) :
                echo "<h2>Kết quả tìm kiếm cho từ khoá: $search</h2>";
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
        endif;
        ?>
    </tbody>
</table>

<?php include './footer.php' ?>
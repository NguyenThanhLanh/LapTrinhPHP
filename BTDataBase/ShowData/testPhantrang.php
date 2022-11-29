<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phan trang</title>
</head>

<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua','3307');
    mysqli_set_charset($conn, 'UTF8');
    $rowsPerPage = 10; //số mẩu tin trên mỗi trang, giả sử là 10
    if (!isset($_GET['page'])) {
        $_GET['page'] = 1;
    }

    $offset = ($_GET['page'] - 1) * $rowsPerPage;

    $sql = 'select s.ten_sua,hs.Ten_hang_sua,ls.Ten_loai,s.Trong_luong,s.Don_gia 
from sua s, loai_sua ls, hang_sua hs 
where s.ma_loai_sua = ls.ma_loai_sua and s.ma_hang_sua = hs.ma_hang_sua limit ' . $offset  . ',' . $rowsPerPage;
    $result = mysqli_query($conn, $sql);
    echo "<p align='center'><font size='5'> THÔNG TIN SỮA</font></P>";
    echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
    echo
    '<tr>
    <th width="20">STT</th>
    <th width="50">Tên sữa</th>
    <th width="150">Hãng sữa</th>
    <th width="150">Loai sữa</th>
    <th width="20">Trọng lượng</th>
    <th width="20">Đơn giá</th>
    </tr>';
    if (mysqli_num_rows($result) <> 0) {
        $stt = 1;
        while ($rows = mysqli_fetch_row($result)) {
            echo "<tr>";
            echo "<td>$stt</td>";
            echo "<td>$rows[0]</td>";
            echo "<td>$rows[1]</td>";
            echo "<td>$rows[2]</td>";
            echo "<td>$rows[3]</td>";
            echo "<td>$rows[4]</td>";
            echo "</tr>";
            $stt += 1;
        } //while
    }
    echo "</table>";
    $re = mysqli_query($conn, 'select * from sua');
    //tổng số mẩu tin cần hiển thị
    $numRows = mysqli_num_rows($re);
    //tổng số trang
    $maxPage = floor($numRows / $rowsPerPage) + 1;
    //tổng số trang
    $maxPage = floor($numRows / $rowsPerPage) + 1;
    //tạo link tương ứng tới các trang
    echo '<p style="text-align:center;">';
    for ($i = 1; $i <= $maxPage; $i++) {
        if ($i == $_GET['page']) {
            echo '<b>' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
        } else
            echo "<span style='text-align:center; item-align: center;'><a href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">" . $i . "</a> </span>";
    }

    echo '</p>';
    $re = mysqli_query($conn, 'select * from sua');
    //tổng số mẩu tin cần hiển thị
    $numRows = mysqli_num_rows($re);
    //tổng số trang
    $maxPage = floor($numRows / $rowsPerPage) + 1;
    echo '<p style="text-align:center;">Tổng số trang là: ' . $maxPage . '</p>';
    ?>
</body>

</html>
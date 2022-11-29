<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị lưới</title>
    <style>
        table{
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #ccc;
        }
        td {
            border: 1px solid #ccc;
        }

        .main {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    define('host', 'localhost');
    define('username', 'root');
    define('pass', '');
    define('databasename', 'qlbansua');
    define('port', '3307');
    $conn = mysqli_connect(host, username, pass, databasename, port)
        or die('Không thể kết nối tới database' . mysqli_connect_error());

    $sql = "SELECT Ma_hang_sua, Ten_hang_sua, Dia_chi, Dien_thoai, Email FROM hang_sua";

    $result = mysqli_query($conn, $sql);

    ?>

    <div class="main">
        <h3>Thông tin hãng sữa</h3>
        <div class="content">
            <table>
                <tr>
                    <td>Mã HS</td>
                    <td>Tên hãng sữa</td>
                    <td>Địa chỉ</td>
                    <td>Điện thoại</td>
                    <td>Email</td>
                </tr>
                <?php if (mysqli_num_rows($result) <> 0) : ?>
                    <?php
                    while ($row = mysqli_fetch_row($result)) :
                    // while ($row = mysqli_fetch_array($result)) :
                    ?>
                        <!-- html -->
                        <tr>
                            <td><?php echo $row[0] ?></td>
                            <td><?php echo $row[1] ?></td>
                            <td><?php echo $row[2] ?></td>
                            <td><?php echo $row[3] ?></td>
                            <td><?php echo $row[4] ?></td>
                        </tr>
                    <?php endwhile ?>
                <?php endif ?>
            </table>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lưới tùy biến</title>
    <style>
        img{
            height: 40px;
        }
        table{
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #ccc;
        }
        td{
            border: 1px solid #ccc;
        }
        .main{
            text-align: center;
        }
        .headerItem{
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua', '3307')
        or die('Không thể kết nối tới database'.mysqli_connect_error());

        $sql = 'SELECT Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai FROM khach_hang WHERE 1=1';

        $result = mysqli_query($conn, $sql);

    ?>
    <div class="main">
        <h3>Thông tin khách hàng</h3>
        <table>
            <tr>
                <td class="headerItem">Mã KH</td>
                <td class="headerItem">Tên khách hàng</td>
                <td class="headerItem">Giới tính</td>
                <td class="headerItem">Địa chỉ</td>
                <td class="headerItem">Số điện thoại</td>
            </tr>
            <?php 
            $stt = 1; //đếm thứ tự hàng
            while($row = mysqli_fetch_row($result)): 
                $gender = $row[2]? '<img src="../ShowData/Img/Femeil.png" alt="Ảnh Nữ">':'<img src="../ShowData/Img/meil.png" alt="Ảnh Nam">';
                $color = ($stt%2)? '#fa778f':'#fff';
            ?>
                <tr>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $row[0]; ?></td>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $row[1]; ?></td>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $gender; ?></td>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $row[3]; ?></td>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $row[4]; ?></td>
                </tr>
            <?php $stt++; endwhile;?>
        </table>
    </div>
</body>
</html>
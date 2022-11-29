<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lưới định dạng</title>
    <style>
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
        define('host', 'localhost');
        define('username', 'root');
        define('pass', '');
        define('dbname', 'qlbansua');
        define('port', '3307');
        
        $conn = mysqli_connect(host, username,pass, dbname, port) 
        or die('Không thế kết nói tới database'.mysqli_connect_error());

        $sql = 'SELECT Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai FROM khach_hang';

        $result = mysqli_query($conn, $sql); 
    ?>
    <div class="main">
        <h3>Thông tin khách hàng</h3>
        <table>
            <tr>
                <td class="headerItem">Ma KH</td>
                <td class="headerItem">Tên khách hàng</td>
                <td class="headerItem">Giới tính</td>
                <td class="headerItem">Địa chỉ</td>
                <td class="headerItem">Số điện thoại</td>
            </tr>
            <?php 
                $stt = 1; //đếm thứ tự hàng
                while ($row = mysqli_fetch_row($result)): 
                $gender = $row[2]? 'Nữ':'Nam';
                $color = ($stt%2)? '#fa778f':'#fff';
                
            ?>
                <tr>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $row[0]; ?></td>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $row[1]; ?></td>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $gender; ?></td>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $row[3]; ?></td>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $row[4]; ?></td>
                </tr>
            <?php $stt++; endwhile ?>
        </table>
    </div>
</body>
</html>
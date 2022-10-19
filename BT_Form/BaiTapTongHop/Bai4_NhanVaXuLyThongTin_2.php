<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h3 class="Result">Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập: </h3>
        <table>
            <tr>
                <td>Họ tên: </td>
                <td><?php echo $_POST['HoTen']?></td>
            </tr>
            <tr>
                <td>
                    Giới tính:
                </td>
                <td>
                    <?php echo $_POST['GioiTinh']?>
                </td>
            </tr>
            <tr>
                <td>Địa chỉ: </td>
                <td>
                    <?php echo $_POST['DiaChi']?>
                </td>
            </tr>
            <tr>
                <td>Điện thoại: </td>
                <td>
                    <?php echo $_POST['SoDienThoai']?>
                </td>
            </tr>
            <tr>
                <td>Quốc tịch</td>
                <td>
                    <?php echo $_POST['QuocTich']?>
                </td>
            </tr>
            <tr>
                <td>Môn học</td>
                <td>
                    <?php foreach($_POST['Subject'] as $Mh){ echo "$Mh,";}?>
                </td>
            </tr>
            <tr>
                <td>Ghi chú:</td>
                <td>
                    <?php echo $_POST['GhiChu']?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="javascript:window.history.back(-1);">Trở về trang trước</a>
                </td>
            <td></td>
        </tr>
        </table>
</body>
</html>
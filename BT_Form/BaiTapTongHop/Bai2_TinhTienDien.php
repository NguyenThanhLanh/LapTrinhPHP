<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền điện</title>
    <style>
        table {
            background-color: #ccc;
            border-spacing: 0px;
        }

        thead > tr:first-child {
            background-color: rgb(250, 216, 103);
            width: 100%;
            border-spacing: 0;
        }

         td{
            border-spacing: 0;
        }
        
        
    </style>
</head>

<body>
    <?php

    //Lưu lại tên KH
    if (isset($_POST['CustomName'])) {
        $CustomName = trim($_POST['CustomName']);
    } else
        $CustomName = '';
    //Lưu lại chỉ số cũ
    if (isset($_POST['OldNumeral'])) {
        $OldNumeral = $_POST['OldNumeral'];
    } else {
        $OldNumeral = '';
    }
    //Lưu lại chỉ số mới
    if (isset($_POST['NewNumeral'])) {
        $NewNumeral = $_POST['NewNumeral'];
    } else {
        $NewNumeral = null;
    }
    //Lưu lại đơn giá
    if (isset($_POST['Price'])) {
        $Price = $_POST['Price'];
    } else {
        $Price = 20000; // Giá mặc định
    }

    if (isset($_POST['Tinh'])) {
        if ($CustomName == null) {
            echo "<br>" . "<font color = red>Bạn chưa nhập tên khách hàng</font>\n";
        }

        if ($OldNumeral == null) {
            echo "<br>" . "<font color = red>Bạn chưa nhập chỉ số điện cũ</font>";
        }

        if ($NewNumeral == null) {
            echo "<br>" . "<font color = red>Bạn chưa nhập chỉ số điện mới</font>";
        }

        if ($NewNumeral < $OldNumeral) {
            echo "<br>" . "<font color = red>Phải nhập chỉ số mới lơn hơn chỉ số củ</font>";
        }

        if (is_numeric($CustomName)) {
            echo "<br>" . "<font color = red>Bạn phải nhập tên không số</font>";
        }

        if (!is_numeric($CustomName) && $CustomName != null && $OldNumeral != null && $NewNumeral != null && $NewNumeral >= $OldNumeral) {
            $TotalMoney = ($NewNumeral - $OldNumeral) * $Price;
        } else {
            echo "<br>" . "<font color = red>Bạn đã nhập sai hoặc thiếu định dạng form</font>";
            $TotalMoney = null;
        }
    } else {
        $TotalMoney = null;
    }

    ?>

    <form action="Bai2_TinhTienDien.php" align='center' method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="3">
                        <h3>Thanh toán tiền điện</h3>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tên chủ hộ: </td>
                    <td><input type="text" pattern="[A-Za-z]{*}" name="CustomName" value="<?php echo $CustomName; ?>"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Chỉ số cũ: </td>
                    <td><input type="text" name="OldNumeral" value="<?php echo $OldNumeral; ?>"></td>
                    <td> (Kw) </td>
                </tr>
                <tr>
                    <td>Chỉ số mới: </td>
                    <td><input type="text" name="NewNumeral" value="<?php echo $NewNumeral; ?>"></td>
                    <td> (Kw) </td>
                </tr>
                <tr>
                    <td>Đơn giá: </td>
                    <td><input type="text" name="Price" value="<?php echo $Price; ?>"></td>
                    <td> (VND) </td>
                </tr>
                <tr>
                    <td>Số tiền thanh toán: </td>
                    <td><input type="text" disabled name="TotalMoney" value="<?php echo $TotalMoney; ?>"></td>
                    <td> (VND) </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" name="Tinh" value="Tính">
                    </td>
                    <td></td>
                </tr>
            </tbody>

        </table>
    </form>
</body>

</html>
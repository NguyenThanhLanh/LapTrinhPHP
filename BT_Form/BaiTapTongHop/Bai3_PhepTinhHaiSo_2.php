<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (is_numeric($_POST['Number_1st'])) {
        $Number_1st = trim($_POST['Number_1st']);
    } else {
        $Number_1st = 'Không nhận được định dạng';
    }

    if (is_numeric($_POST['Number_2st'])) {
        $Number_2st = trim($_POST['Number_2st']);
    } else {
        $Number_2st = 'Không nhận được định dạng';
    }

    if ($Number_1st != '' && $Number_2st != '' || is_numeric($_POST['Number_1st']) || is_numeric($_POST['Number_2st'])) {
        $Result = "Không thực hiện được phép tính";

        switch ($_POST['option']) {
            case 'Cong':
                $Result = $Number_1st + $Number_2st;
                $NameOptioned = 'Cộng';
                break;
            case 'Tru':
                $Result = $Number_1st - $Number_2st;
                $NameOptioned = 'Trừ';
                break;
            case 'Nhan':
                $Result = $Number_1st * $Number_2st;
                $NameOptioned = 'Nhân';
                break;
            case 'Chia':
                $Result = $Number_1st / $Number_2st;
                $NameOptioned = 'Chia';
                break;
            default:
                $Result = "Không thể thực hiện";
                $NameOptioned = 'Dell';
                break;
        }
    }

    ?>
    <!-- HTML -->
    <h3 class="main__heading">PHÉP TÍNH TRÊN HAI SỐ</h3>
    <table>
        <tr>
            <td>
                Chọn phép tính:
            </td>
            <td>
                <span class="optioned">
                    <?php echo $NameOptioned ?>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                Số thứ nhất:
            </td>
            <td>
                <input type="text" name="Number_1st" disabled value="<?php echo $_POST["Number_1st"] ?>">
            </td>
        </tr>
        <tr>
            <td>
                Số thứ hai:
            </td>
            <td>
                <input type="text" name="Number_2st" disabled value="<?php echo $_POST['Number_2st'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                Kết quả:
            </td>
            <td>
                <input type="text" name="Number_2st" disabled value="<?php echo $Result ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <a href="javascript:window.history.back(-1);">Trở về trang trước</a>
            </td>
        </tr>

    </table>
    </div>
</body>

</html>
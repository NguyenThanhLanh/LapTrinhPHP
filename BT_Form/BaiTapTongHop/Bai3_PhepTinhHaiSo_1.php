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
    if (isset($_POST['Number_1st'])) {
        $Number_1st = trim($_POST['Number_1st']);
    } else {
        $Number_1st = '';
    }
    var_dump($Number_1st);
    
    if (isset($_POST['Number_2st'])) {
        $Number_2st = trim($_POST['Number_2st']);
    } else {
        $Number_2st = '';
    }
    $Transform = false;
    if (isset($_POST['Tinh'])) {
        if ($Number_1st == '' || !is_numeric($Number_1st)) {
            echo "<font color = red>Bạn chưa nhập tham số thứ nhất</font><br>";
            $Transform = false;
        } else
        if ($Number_2st == '' || !is_numeric($Number_2st)) {
            echo "<font color = red>Bạn chưa nhập tham số thứ hai</font><br>";
            $Transform = false;
        } else
            $Transform = true;
    }

    ?>

    <!-- HTML -->
    <form action="
    <?php
    if ($Transform)
        echo "Bai3_PhepTinhHaiSo_2.php";
    else
        echo "#";
    ?>
        " method="POST">
        <div class="main">
            <h3 class="main__heading">PHÉP TÍNH HAI SỐ</h3>
            <table>
                <tr>
                    <td>
                        Chọn phép tính:
                    </td>
                    <td>
                        <div class="list__option">
                            <input type="radio" name="option" id="Plus" value="Cong" checked><span class="nameoption">Cộng</span>
                            <input type="radio" name="option" id="Minus" value="Tru"><span class="nameoption">Trừ</span>
                            <input type="radio" name="option" id="Multiply" value="Nhan"><span class="nameoption">Nhân</span>
                            <input type="radio" name="option" id="Divide" value="Chia"><span class="nameoption">Chia</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Số thứ nhất:
                    </td>
                    <td>
                        <input type="text" name="Number_1st" value="<?php echo $Number_1st ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Số thứ hai:
                    </td>
                    <td>
                        <input type="text" name="Number_2st" value="<?php echo $Number_2st ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Tính" name="Tinh">
                    </td>
                </tr>

            </table>
        </div>
    </form>
</body>

</html>
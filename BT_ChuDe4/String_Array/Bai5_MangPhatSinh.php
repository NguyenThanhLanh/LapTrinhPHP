<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phát sinh mảng</title>
</head>

<body>
    <?php
    function SinhMang($Number)
    {
        $arr = array();
        for ($i = 0; $i < $Number; $i++) {
            $arr[$i] = rand(1, 20);
        }
        return $arr;
    }

    function TimGTLN($arr)
    {
        $max = $arr[0];
        for ($i = 1; $i < count($arr); $i++) {
            if ($max < $arr[$i]) $max = $arr[$i];
        }
        return $max;
    }

    function TimGTNN($arr)
    {
        $min = $arr[0];
        for ($i = 1; $i < count($arr); $i++) {
            if ($min > $arr[$i]) $min = $arr[$i];
        }
        return $min;
    }

    function SumArray($arr)
    {
        $sum = 0;
        for ($i = 0; $i < count($arr); $i++) {
            $sum += $arr[$i];
        }
        return $sum;
    }

    $Number = '';
    $ResultArr ='';
    $maxArray = '';
    $ResultArrStr = '';
    $minArray = '';
    $TongMang = '';
    if (isset($_REQUEST['Number'])) {
        if (is_numeric($_REQUEST['Number'])){
            $Number = trim($_REQUEST['Number']);
            $ResultArr = SinhMang($Number);
        }
        else {
            echo "<font color = red>Nhập sai định dạng</font>\n";
        }
    }

    if (isset($_REQUEST['Submit'])) {
        if ($Number > 0) {
            $ResultArrStr = implode(", ", $ResultArr);
            $maxArray = TimGTLN($ResultArr);
            $minArray = TimGTNN($ResultArr);
            $TongMang = SumArray($ResultArr);
        }
    }

    ?>
    <Form action="" method="POST">
        <fieldset style="width: fit-content;">
            <legend>
                <h4>Phát sinh mảng và tính toán</h4>
            </legend>
            <table>
                <tr>
                    <td style="width: 201px;">
                        <Label for="Number">Nhập số phần tử: </Label>
                    </td>
                    <td>
                        <input type="text" name="Number" value="<?php echo $Number ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="Submit" value="Phát sinh và tính toán">
                    </td>
                </tr>
            </table>
            <fieldset>
                <legend>
                    <h4 style="margin: 0;">Kết quả</h4>
                </legend>
                <table>
                    <tr>
                        <td>Mảng: </td>
                        <td>
                            <input type="text" name="ResultArr" value="
                            <?php
                            if ($ResultArrStr != '') {
                                echo $ResultArrStr;
                            }
                            ?>
                            " disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>GTLN(MAX) trong mảng: </td>
                        <td>
                            <input type="text" name="ResultMaxArr" value="
                            <?php
                            echo $maxArray;
                            ?>
                            " disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>GTNN (MIN) trong mảng: </td>
                        <td>
                            <input type="text" name="ResultMinArr" value="
                            <?php
                            echo $minArray;
                            ?>
                            " disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>Tổng mảng: </td>
                        <td>
                            <input type="text" name="ResultSumArr" value="
                            <?php
                            echo $TongMang;
                            ?>
                            " disabled>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            (<span style="color: red;">Ghi chú: </span> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)
                        </td>
                    </tr>
                </table>
            </fieldset>
        </fieldset>
    </Form>
</body>

</html>
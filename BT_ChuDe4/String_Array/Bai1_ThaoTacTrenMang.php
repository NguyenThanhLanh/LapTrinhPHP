<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thao tác cơ bản trên mảng</title>
    <style>
        tr>td:nth-child(2) {
            width: 300px;
        }

        .width_full {
            width: 100%;
        }

        textarea {
            height: 200px;
        }
    </style>
</head>

<body>
    <?php
    //Đếm phần tử chẵn trong mảng
    function DemSoChan($arr)
    {
        $count = 0;
        foreach ($arr as $val) {
            if ($val % 2 == 0)
                $count += 1;
        }
        return $count;
    }

    //Đếm phần tử nhỏ hơn 100
    function DemPhanTuBeHon100($arr)
    {
        $count = 0;
        foreach ($arr as $val) {
            if ($val < 100) {
                $count += 1;
            }
        }
        return $count;
    }
    // Tổng phần tử âm trong mảng
    function TongPhanTuAm($arr)
    {
        $sum = 0;
        foreach ($arr as $value) {
            if ($value < 0) {
                $sum += $value;
            }
        }
        return $sum;
    }
    //Check phần tử có số kề cuối bằng 0
    function CheckSo($number)
    {
        if (floor($number /= 10) % 10 == 0 && $number > 10)
            return true;
        return false;
    }

    //Tìm vị trí các phần tử trong mảng thỏa yêu cầu Check
    function TimViTriYeuCau($arr)
    {
        $index = 0;
        $ViTri[0] = -1;
        for ($i = 0; $i < count($arr); $i++) {
            if (CheckSo(abs($arr[$i]))) {
                $ViTri[$index] = $i;
                $index++;
            }
        }
        if ($ViTri != null) {
            return $ViTri;
        }
    }

    //Sắp xếp lại mảng
    function SapXepMang(&$arr)
    {
        for ($i = 0; $i < count($arr) - 1; $i++) {
            for ($j = $i + 1; $j < count($arr); $j++) {
                if ($arr[$i] > $arr[$j]) {
                    $tmp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            }
        }
    }
    $so = "";
    $maTrixStr = "";
    $SoPhanTuChan = "";
    $SoPhanTuNho100 = "";
    $MatrixSorted = "";
    $ViTriPhanTu = "Không có phần tử thõa yêu cầu!";

    if (isset($_REQUEST['SoNhapMoi'])) {
        $so = trim($_REQUEST['SoNhapMoi']);
    }

    if (isset($_REQUEST['Tinh'])) {
        if (is_numeric($so) && $so != "") {
            for ($i = 0; $i < $so; $i++) {
                $arr[$i] = rand(-200, 200);
            }
            $maTrixStr = trim(implode(", ", $arr));
            $SoPhanTuChan = DemSoChan($arr);
            $SoPhanTuNho100 = DemPhanTuBeHon100($arr);
            if (TimViTriYeuCau($arr) != null) {
                $ViTriPhanTu = implode(", ", TimViTriYeuCau($arr));
            }
            SapXepMang($arr);
            $MatrixSorted = trim(implode(", ", $arr));
        } else {
            $maTrixStr = "Nhập tham số không đúng";
            $SoPhanTuChan = 0;
        }
    }

    ?>
    <div class="main">
        <fieldset style="width: fit-content;">
            <legend>
                <h3>Các thao tác với mảng số nguyên</h3>
            </legend>
            <Form action="#">
                <table>
                    <tr>
                        <td>
                            Nhập vào số nguyên n:
                        </td>
                        <td>
                            <input type="text" class="width_full" name="SoNhapMoi" value="<?php if (isset($_REQUEST['SoNhapMoi'])) echo $so ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Kết quả:
                        </td>
                        <td>
                            <textarea disabled class="width_full">
                            <?php if (isset($_REQUEST['Tinh'])) {
                                echo "Mảng sinh ra: " . $maTrixStr . "\n";
                                echo "Số phần tử chẵn: " . $SoPhanTuChan . "\n";
                                echo "Số phần tử nhỏ hơn 100: " . $SoPhanTuNho100 . "\n";
                                echo "Vị trí các phần tử có số 0 kề cuối: " . $ViTriPhanTu . "\n";
                                echo "Mảng sau khi sắp xếp: " . $MatrixSorted . "\n";
                            }
                            ?>
                        </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="Tinh" value="Tính">
                        </td>
                    </tr>
                </table>
            </Form>
        </fieldset>
    </div>
</body>

</html>
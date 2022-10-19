<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm năm nhuận</title>
</head>

<body>
    <?php
    function CheckNamNhuan($Year)
    {
        if ($Year % 4 == 0 && $Year % 100 != 0) {
            return true;
        }
        return false;
    }
    $Year = "";
    $listResult = "";
    if (isset($_REQUEST['Input_Year'])) {
        $Year = trim($_REQUEST['Input_Year']);
    }

    if (isset($_REQUEST['Submit'])) {
        if (is_numeric($Year) && $Year!=null) {
            $dem = 0;
            foreach (range(2000, $Year) as $val) {
                if (CheckNamNhuan($val)) {
                    $listYear[$dem] = $val;
                    $dem++;
                }
            }
            if (count($listYear) == 0) {
                $listResult = "Không có phần năm nào trong khoảng từ $Year đến 2000 là năm nhuận";
            } else {
                $listResult = "Danh sách năm nhuận là : " . implode(" ", $listYear);
            }
        } else {
            echo "<font color=red >Tham số đầu vào nhập không đúng định dạng!</font>" . "\n";
        }
    }

    ?>
    <div class="main">
        <Form action="Bai2_MangNamNhuan.php" method="POST">
            <fieldset style="width: fit-content;">
                <legend>
                    <h4>Tìm danh sách các năm nhuận đến năm 2000</h4>
                </legend>
                <table style="width: 100%;">
                    <tr>
                        <td style="min-width: 80px">
                            <label for="">Năm: </label>
                        </td>
                        <td>
                            <input type="text" style="width: 100%;" name="Input_Year" value="<?php echo $Year; ?>">
                        </td>
                    </tr>
                    <tr style="width: 100%;">
                        <td colspan="2">
                            <textarea type="text" name="ListKetQua" disabled style="width: 100%; min-height: 40px; height: fit-content;">
                            <?php
                            echo $listResult;
                            ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr style="text-align: center;">
                        <td colspan="2">
                            <input type="submit" value="Tìm năm nhuận" name="Submit">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </Form>
    </div>
</body>

</html>
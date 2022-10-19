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
        function TransformYear($Year, $can = 
            array('Canh', 'Tân', 'Nhâm', 'Quý','Giáp','Ất','Bính','Đinh','Mậu','Kỷ'), $chi =
            array('Thân','Dậu','Tuất','Hợi','Tý','Sửu','Dần','Mẹo','Thìn','Tỵ','Ngọ','Mùi')
            ){
            if ($Year != '') {
                return $can[($Year % 10)] . " " . $chi[($Year%12)];
            }
            return 'Nhập năm sai!';
        }
        $ListImg = array(
            '../Bai3_CheckNamNhuan/images/images/than.jpg',
            '../Bai3_CheckNamNhuan/images/images/dau.jpg',
            '../Bai3_CheckNamNhuan/images/images/tuat.jpg',
            '../Bai3_CheckNamNhuan/images/images/hoi.jpg',
            '../Bai3_CheckNamNhuan/images/images/ty.jpg',
            '../Bai3_CheckNamNhuan/images/images/suu.jpg',
            '../Bai3_CheckNamNhuan/images/images/dan.jpg',
            '../Bai3_CheckNamNhuan/images/images/meo.jpg',
            '../Bai3_CheckNamNhuan/images/images/thin.jpg',
            '../Bai3_CheckNamNhuan/images/images/ty.jpg',
            '../Bai3_CheckNamNhuan/images/images/ngo.jpg',
            '../Bai3_CheckNamNhuan/images/images/mui.jpg',
        );
        $Year = '';
        $Input_Year = '';
        $Output_Year = '';
        $Year_Img = '';

        if(isset($_REQUEST['Input_Year'])){
            $Year = ($_REQUEST['Input_Year']);
        }

        if (isset($_REQUEST['Submit'])) {
            $Output_Year = TransformYear($Year);
            $Year_Img = $ListImg[($Year % 12)];
        }

    ?>
    <div class="main">
        <Form action="">
            <fieldset style="width: fit-content;">
                <legend>
                    <h4>Tính năm âm lịch</h4>
                </legend>
                <table style="width: 100%;">
                    <tr>
                        <td style="text-align: center;">
                            <Label for="">
                                Năm dương lịch
                            </Label>
                        </td>
                        <td></td>
                        <td style="text-align: center;">
                            <Label for="">
                                Năm âm lịch
                            </Label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name='Input_Year' value="<?php if(isset($_REQUEST['Input_Year'])){ echo $_REQUEST['Input_Year']; } ?>">
                        </td>
                        <td>
                            <button type="submit" formaction="../Bai3_CheckNamNhuan/CheckNamNhuan.php" name='Submit'><span style="color: red">=></span></button>
                        </td>
                        <td>
                            <input type="text" name='Output_Year' disabled value="<?php echo $Output_Year ?>">
                        </td>
                    </tr>
                    <?php 
                        if ($Year_Img != null) {
                            echo "
                            <tr>
                                <td colspan='3' style='text-align: center;'>
                                    <img src=" . $Year_Img ." alt='Anh Dong Vat'>
                                </td>
                            </tr>";
                        };
                    ?>
                </table>
            </fieldset>
        </Form>
    </div>
</body>

</html>
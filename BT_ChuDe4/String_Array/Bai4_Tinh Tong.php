<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tổng mảng</title>
</head>
<body>
    <?php
    function TongMang($arr){
        $sum = 0;
        foreach ($arr as $val) {
            $sum+=$val;
        }
        return $sum;
    }

    $inputArr = array();
    $SumArr = '';
    if (isset($_REQUEST['ArrName'])) {
        $inputArr = explode(",", trim($_REQUEST['ArrName']));
    }

    if (isset($_REQUEST['Submit'])) {
        if (count($inputArr) > 0) {
            $SumArr = TongMang($inputArr);
        }
    }
    var_dump($inputArr);
    var_dump($SumArr);
    ?>
    <Form>
        <fieldset style="width: fit-content;">
            <legend><h4>Nhập và tính tổng dãy số</h4></legend>
            <table>
                <tr>
                    <td>Nhập dãy số: </td>
                    <td>
                        <input type="text" name="ArrName" value="<?php if(count($inputArr)>0) echo implode(",", $inputArr) ;?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="Submit" value="Tổng dãy số">
                    </td>
                </tr>
                <tr>
                    <td>
                        Tổng dãy số: 
                    </td>
                    <td>
                        <input type="text" disabled value="<?php echo $SumArr;?>">
                    </td>
                </tr>
            </table>
        </fieldset>
    </Form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sắp xếp mảng</title>
</head>

<body>
    <?php
        function SortAscendingArr(&$arr){
            for ($i=0; $i < count($arr) - 1; $i++) { 
                for ($j=$i+1; $j < count($arr); $j++) { 
                    if ($arr[$i] > $arr[$j]) {
                        $tmp = $arr[$i];
                        $arr[$i]=$arr[$j];
                        $arr[$j]=$tmp;
                    }
                }
            }
        }

        function SortDecendingArr(&$arr){
            for ($i=0; $i < count($arr) - 1; $i++) { 
                for ($j=$i+1; $j < count($arr); $j++) { 
                    if ($arr[$i] < $arr[$j]) {
                        $tmp = $arr[$i];
                        $arr[$i]=$arr[$j];
                        $arr[$j]=$tmp;
                    }
                }
            }
        }

        $inputArr = '';
        $tmpArr = array();
        $AscendingArrResult = array();
        $DecendingArrResult = array();

        if (isset($_REQUEST['InputArr']) && $_REQUEST['InputArr']!='') {
            $tmpArr = explode(",",$_REQUEST['InputArr']);
            $inputArr = implode(",",$tmpArr);
        }

        if (isset($_REQUEST['Submit'])) {
            if (count($tmpArr)!= 0) {
                SortAscendingArr($tmpArr);
                $AscendingArrResult = $tmpArr;
                SortDecendingArr($tmpArr);
                $DecendingArrResult = $tmpArr;
            }
            else{
                echo "<font color=red>Không nhận diện được mảng</font>";
            }
            
        }

    ?>
    <Form>
        <fieldset style="width: fit-content;">
            <legend>Sắp xếp mảng</legend>
            <table>
                <tr>
                    <td>Nhập mảng: </td>
                    <td>
                        <input type="text" name="InputArr" value="<?php echo $inputArr;?>"><span style="color:red;"> (*)</span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Sắp xếp tăng/giảm" name="Submit">
                    </td>
                </tr>
                <tr>
                    <td><span style="color:red;">Sau khi sắp xếp</span></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tăng dần:</td>
                    <td>
                        <input type="text" disabled name="ascendingArr" value="<?php echo implode(",", $AscendingArrResult) ?>">
                    </td>
                </tr>
                <tr>
                    <td>Giảm dần:</td>
                    <td>
                        <input type="text" disabled name="decendingArr" value="<?php echo implode(",", $DecendingArrResult) ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <span style="color:red;">(*)</span> Các số được nhập cách nhau bằng dấu ","
                    </td>
                </tr>
            </table>
        </fieldset>
    </Form>
</body>

</html>
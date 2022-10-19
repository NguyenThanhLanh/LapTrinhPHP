<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay thế phần tử trong mảng</title>
</head>

<body>
    <?php
        function ReplaceArr(&$arr, $number, $replaceVal){
            // foreach($arr as $val){
            //     if($val === $number)
            //     $val = $replaceVal;
            // }
            for ($i=0; $i < count($arr); $i++) { 
                if($arr[$i]==$number)
                    $arr[$i]=$replaceVal;
            }
        }

        $inputArr = array();
        $replace = '';
        $replaceVal = '';
        $OldArr = array();
        $NewArr = array();

        if (isset($_REQUEST['InputArr'])) {
            $inputArr = explode(',', trim($_REQUEST['InputArr']));
        }

        if (isset($_REQUEST['Replace'])) {
            $replace = trim($_REQUEST['Replace']);
        }

        if (isset($_REQUEST['ValueReplace'])) {
            $replaceVal = trim($_REQUEST['ValueReplace']);
        }

        if (isset($_REQUEST['Submit'])) {
            if (count($inputArr)>0 && $replace != '' && $replaceVal != '') {
                $OldArr = $inputArr;
                ReplaceArr($inputArr, $replace, $replaceVal);
                $NewArr = $inputArr;
            }
            else{
                echo "<font color = red>Đã nhập sai định dạng form</font>";
            }
        }
    ?>
    <Form>
        <fieldset style="width: fit-content;">
            <legend>
                <h4>Thay thế phần tử trong mảng</h4>
            </legend>
            <table>
                <tr>
                    <td>Nhập các phần tử: </td>
                    <td>
                        <input type="text" name="InputArr" value="<?php echo implode(",", $OldArr); ?>">
                    </td>
                </tr>
                <tr>
                    <td>Giá trị cần thay thế: </td>
                    <td>
                        <input type="text" name="Replace" value="<?php echo $replace; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Giá trị thay thế: </td>
                    <td>
                        <input type="text" name="ValueReplace" value="<?php echo $replaceVal; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Thay thế" name="Submit">
                    </td>
                </tr>
            </table>
            <fieldset style="width: fit-content;">
                <legend>
                    <h4>Kết quả</h4>
                </legend>
                <table>
                    <tr>
                        <td>Mảng cũ: </td>
                        <td>
                            <input type="text" name="OldArr" value="<?php echo implode(", ", $OldArr); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Mảng sau khi thay thế: </td>
                        <td>
                            <input type="text" name="NewArr" value="<?php echo implode(", ", $NewArr); ?>">
                        </td>
                    </tr>
                </table>
            </fieldset>
            <div class="Note">(<span style="color:red;">Ghi chú:</span> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</div>
        </fieldset>

    </Form>
</body>

</html>
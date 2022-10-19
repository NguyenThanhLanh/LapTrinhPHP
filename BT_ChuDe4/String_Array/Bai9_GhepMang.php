<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghép mảng</title>
    <style>
        .width_100px {
            min-width: 100px;
        }
    </style>
</head>

<body>
    <?php
        $Array_A = array();
        $Array_B =  array();
        $ResultArrayA = '';
        $ResultArrayB = '';
        $MixArray = array();
        $Ascending = array();
        $Decending = array();

        if(isset($_REQUEST['inputArr_A'])){
            if ($_REQUEST['inputArr_A']!='') {
                $Array_A = explode(",", $_REQUEST['inputArr_A']);
            }
        }

        if(isset($_REQUEST['inputArr_B'])){
            if ($_REQUEST['inputArr_B']!='') {
                $Array_B = explode(",", $_REQUEST['inputArr_B']);
            }
        }

        

        if (isset($_REQUEST['Submit'])) {
            if (count($Array_A)!=0 && count($Array_B)!=0) {
                $ResultArrayA = implode(",", $Array_A);
                $ResultArrayB = implode(",", $Array_B);
                $MixArray = array_merge($Array_A, $Array_B);
                $tmp = $MixArray;
                sort($tmp);
                $Ascending = $tmp;
                rsort($tmp);
                $Decending = $tmp;
            }
            else{
                echo "<font color=red>Bạn đã nhập sai định dạng form</font>";
            }
        }
    ?>
    <div class="main">
        <Form>
            <fieldset style="width: fit-content;">

                <h3 style="text-align: center;">Đếm phần tử, ghép mảng và sắp xếp</h3>
                <table>
                    <tr>
                        <td class="width_100px">Mảng A:</td>
                        <td>
                            <input type="text" name="inputArr_A" value="<?php echo $ResultArrayA; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="width_100px">Mảng B:</td>
                        <td>
                            <input type="text" name="inputArr_B" value="<?php echo $ResultArrayB ;?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="Submit" value="Thực hiện">
                        </td>
                    </tr>
                </table>
                <fieldset>
                    <legend>Kết quả</legend>
                    <table>
                        <tr>
                            <td>Số phần tử mảng A:</td>
                            <td>
                                <input disabled type="text" name="QuantytiArray_A" value="<?php echo count($Array_A); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Số phần tử mảng B:</td>
                            <td>
                                <input disabled type="text" name="QuantytiArray_B" value="<?php echo count($Array_B); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Mảng C:</td>
                            <td>
                                <input disabled type="text" name="BlendArray" value="<?php echo implode(',', $MixArray) ;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Mảng C tăng dần:</td>
                            <td>
                                <input disabled type="text" name="SortBlendArray_Ascending" value="<?php echo implode(',', $Ascending); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Mảng C giảm dần:</td>
                            <td>
                                <input disabled type="text" name="SortBlendArray_Decending" value="<?php echo implode(',', $Decending) ?>">
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </fieldset>
        </Form>
    </div>
</body>

</html>
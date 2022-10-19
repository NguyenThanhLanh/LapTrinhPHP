<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập Ma Trận</title>
</head>

<body>
    <?php
        $MaTran = array();
        if (isset($_REQUEST['Row'])) {
            $Row = trim($_REQUEST['Row']);
        }
        else {
            $Row = 1;
        }
        
        if (isset($_REQUEST['Column'])) {
            $Column = trim($_REQUEST['Column']);
        }
        else {
            $Column = 1;
        }
        if (isset($_REQUEST['Submit'])) {
            if (!is_numeric($Row)||!preg_match('/[2-5]/', $Row)) {
                echo "<font color = red>Nhập số dòng sai định dang 2 <= số dòng <= 5</font>";
            }
            else
            if (!is_numeric($Column)||!preg_match('/[2-5]/', $Column)) {
                echo "<br>"."<font color = red>Nhập số cột sai định dang 2 <= số cột <= 5</font>";
            }
            else
            {
                for ($i=0; $i < $Row; $i++) { 
                    for ($j=0; $j < $Column ; $j++) { 
                        $MaTran[$i][$j]=rand(-1000,1000);
                    }
                }
            }
        }


        // for ($i=0; $i < $Row; $i++) { 
        //     for ($j=0; $j < $Column ; $j++) { 
        //         $MaTran[$i][$j]=rand(-1000,1000);
        //     }
        // }
        // var_export($MaTran);

    ?>
    <Form action="" method="GET">
        <fieldset style="width: fit-content;">
            <legend>Hiện thị ma trận số nguyên</legend>
            <table>
                <tr>
                    <td>Nhập số dòng: </td>
                    <td>
                        <input type="text" name="Row" id="Dong" style="width: 100%;" value="
                        <?php if (isset($_REQUEST['Row'])) {
                            echo $_REQUEST['Row'];
                        }
                        else echo ""; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nhập số cột: </td>
                    <td>
                        <input type="text" name="Column" id="Cot" style="width: 100%;" value=" 
                        <?php 
                        if (isset($_REQUEST['Column'])) {
                            echo $_REQUEST['Column'];
                        }else echo "";
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Kết quả: </td>
                    <td>
                        <textarea disabled style="width: 360px; height: 224px;">
                            <?php
                            if ($MaTran!=null) {
                                for ($i=0; $i < $Row; $i++) { 
                                    for ($j=0; $j < $Column ; $j++) { 
                                        echo $MaTran[$i][$j]."\t";
                                    }
                                    echo "\n";
                                }
                            }
                            ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="Submit" value="Xuất Ma Trận">
                        <input type="button" value="Reset" formaction="">
                    </td>
                </tr>
            </table>
        </fieldset>
    </Form>
</body>

</html>
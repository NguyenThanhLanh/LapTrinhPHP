<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Tính diện tích HCN</title>

    <style type="text/css">
        body {
            background-color: #d24dff;
        }

        table {
            background: #ffd94d;
            border: 0 solid yellow;
        }

        thead {
            background: #fff14d;
        }

        td {
            color: blue;
        }

        h3 {
            font-family: verdana;
            text-align: center;
            /* text-anchor: middle; */
            color: #ff8100;
            font-size: medium;
        }
    </style>

</head>



<body>
    <?php
    if (isset($_POST['chieudai']))
        $chieudai = trim($_POST['chieudai']);
    else $chieudai = '';

    if (isset($_POST['chieurong']))
        $chieurong = trim($_POST['chieurong']);
    else $chieurong = '';

    if (isset($_POST['tinh']))
        if (isset($_POST['chieudai']) && $chieudai != '') {
            if (isset($_POST['chieurong']) && $chieurong != '') {
                if (is_numeric($chieudai) && is_numeric($chieurong))
                    $dientich = $chieudai * $chieurong;
                else {
                    echo "<font color='red'>Vui lòng nhập vào số! </font>";
                    $dientich = "";
                }
            }
            else {
                echo "<font color = 'red'>Vui lòng nhập chiều rộng</font>";
                $dientich = '';
            }
        }
        else {
            echo "<font color = 'red'>Vui lòng nhập chiều dài</font>";
            $dientich = '';
        }
        
    else $dientich = '';
    ?>

    <form align='center' action="Bai1_TinhDienTichHCN.php" method="post">

        <table>

            <thead>

                <th colspan="2" align="center">
                    <h3>DIỆN TÍCH HÌNH CHỮ NHẬT</h3>
                </th>

            </thead>

            <tr>
                <td>Chiều dài:</td>

                <td><input type="text" name="chieudai" value="<?php echo $chieudai; ?> " /></td>

            </tr>

            <tr>
                <td>Chiều rộng:</td>

                <td><input type="text" name="chieurong" value="<?php echo $chieurong; ?> " /></td>

            </tr>

            <tr>
                <td>Diện tích:</td>
                <td><input type="text" name="dientich" disabled="disabled" value="<?php if ($dientich != 0) {
                    echo $dientich;
                } ?> " /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
            </tr>
        </table>
    </form>
</body>



</html>
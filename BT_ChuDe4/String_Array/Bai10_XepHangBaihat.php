<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xếp hạng bài hát</title>
    <style>
        h4{
            margin: 2px 0px;
        }
    </style>
</head>
<body>
    <?php
        function SapXepThuHang(&$arr){
            if(count($arr)>1){
                for ($i=0; $i < count($arr)-1; $i++) { 
                    for ($j=$i+1; $j < count($arr); $j++) { 
                        if ($arr[$i][1] > $arr[$j][1]) {
                            $tmp=$arr[$i];
                            $arr[$i]=$arr[$j];
                            $arr[$j]=$tmp;
                        }
                    }
                }
            }
        }
        $NameSong = '';
        $XepHang ='';
        $BangXepHang= array(
            array("Nắng ấm xa dần", 4),
            array('Mẹ ơi', 2),
            array('Mãi yêu Việt Nam', 3)
        );
        SapXepThuHang($BangXepHang);
        // var_dump($BangXepHang);

        if (isset($_REQUEST['NameSong'])) {
            $NameSong = trim($_REQUEST['NameSong']);
        }

        if(isset($_REQUEST['Class'])){
            $XepHang = trim($_REQUEST['Class']);
        }

        if (isset($_REQUEST['Submit'])) {
            if ($NameSong != '' && $XepHang != '' && is_numeric($XepHang) && !is_numeric($NameSong)) {
                $Newsong = array($NameSong, $XepHang);
                array_push($BangXepHang, $Newsong);
                SapXepThuHang($BangXepHang);
            }
            else{
                echo "Nhập sai định dạng form";
            }
        }
        // var_dump($BangXepHang);

    ?>
    <Form action="#">
        <Fieldset style="width: fit-content;">
            <legend><h4>Danh sách âm nhạc</h4></legend>
            <fieldset>
                <legend style="text-align: center;"><h4>Thêm bài hát</h4></legend>
                <table>
                    <tr>
                        <td>Nhập tên bài hát: </td>
                        <td>
                            <input type="text" name="NameSong" id="Song" value="<?php  ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Nhập thứ hạng: </td>
                        <td>
                            <input type="text" name="Class" id="cls" value="<?php  ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <!-- <input type="submit" name="Submit" id="Enter" value="Thêm vào BXH"> -->
                           <Button name="Submit">Thêm bài hát</Button>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <fieldset style="width: 400px;">
                <legend style="text-align: center;"><h4>Danh sách bài hát trong bảng xếp hạng</h4></legend>
                <table style="width: 100%;">
                    <tr style="display: flex;">
                        <td style="text-align: center; flex: 1;"><h4>Tên bài hát</h4></td>
                        <td style="text-align: center; flex: 1;"><h4>Thứ hạng</h4></td>
                    </tr>
                    <?php foreach($BangXepHang as $val): ?>
                    <tr style="display: flex;">
                        <td style="text-align: center; flex: 1;"><span><?php echo $val[0] ?></span></td>
                        <td style="text-align: center; flex: 1;"><h4><?php echo $val[1] ?></h4></td>
                    </tr>
                    <?php endforeach ?>
                    
                </table>
            </fieldset>
        </Fieldset>
    </Form>
</body>
</html>
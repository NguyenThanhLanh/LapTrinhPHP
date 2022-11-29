<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi giữa kì</title>
</head>
<body>
    <?php
        //Cach 1
        $SinhViens = array(
            array('61.CNTT-1', '6112341', 'Nguyễn Minh Anh', 'Nữ', '2001-12-03'),
            array('61.CNTT-1', '6110123', 'Trần Anh Tú', 'Nam', '2001-05-16'),
            array('61.CNTT-2', '6111012', 'Nguyễn Ngọc Thanh', 'Nam', '2001-10-20'),
            array('62.TTQL', '6234121', 'Trần Lê Thu', 'Nữ', '2002-05-10')
        );
        //Cach 2 (sử dụng key) Sài cách này
        $SinhVien = array(
            '61.CNTT-1' => array(
                '6112341' => array(
                    'TenSV' => 'Nguyễn Minh Anh',
                    'GioiTinh' => 'Nữ',
                    'NgaySinh' =>'2001-12-03'
                ),
                '6110123' => array(
                    'TenSV' => 'Trần Anh Tú',
                    'GioiTinh' => 'Nam',
                    'NgaySinh' =>'2001-05-16'
                )
                ),
            '61.CNTT-2' => array(
                '6111012' => array(
                    'TenSV' => 'Nguyễn Ngọc Thanh',
                    'GioiTinh' => 'Nam',
                    'NgaySinh' =>'2001-10-20'
                )
                ),
            '62.TTQL' => array(
                '6234121' => array(
                    'TenSV' => 'Trần Lê Thu',
                    'GioiTinh' => 'Nữ',
                    'NgaySinh' =>'2002-05-10'
                )
            )
                );


    $MaSV = '';
    $TenSV = '';
    $NgaySinh = '';
    $ClassName = '';
    $Gender = '';

    if (isset($_REQUEST['Class'])) {    
        $ClassName = $_REQUEST['Class'];
    }

    if (isset($_REQUEST['Gender'])) {
        $Gender = $_REQUEST['Gender'];
    }

    if (isset($_REQUEST['MaSV'])) {
        $MaSV = $_REQUEST['MaSV'];
    }
    if (isset($_REQUEST['TenSV'])) {
        $TenSV = $_REQUEST['TenSV'];
    }
    if (isset($_REQUEST['DateOfBirth'])) {
        // $NgaySinh = date('Y-m-d', $_REQUEST['DateOfBirth']);
        $NgaySinh = trim($_REQUEST['DateOfBirth']);
    }

    if (isset($_REQUEST['Submit'])) {
        if(!empty($ClassName) && !empty($Gender) &&!empty($MaSV) &&!empty($TenSV) &&!empty($NgaySinh)){
            //Thêm sinh vien
            $sv = array( //tạo sinh viên mới
                'TenSV' => $TenSV,
                'GioiTinh' => $Gender,
                'NgaySinh' => $NgaySinh
            ); 
            $SinhVien[$ClassName][] = array( 
                $MaSV => $sv //thêm sinh viên với key là mã SV
            );
            //Ghi File
            $myFile = fopen('SinhVien.dat', 'w');
            foreach ($SinhVien as $key => $val) {
                fwrite($myFile, $key. "\n"."\t");
                foreach ($val as $k => $subval) {
                    fwrite($myFile, $k. ', '.$subval['TenSV'].', '.$subval['GioiTinh'].', '.$subval['NgaySinh']."\n"."\t");
                }
                fwrite($myFile, "\n");
            }
            //ghi xong
            fclose($myFile); //Đóng file
        }
        else {
            echo "<font color = 'red'>Nhập thiếu thông tin</font>";
        }
    }
    echo "<pre>";
    print_r($SinhVien);

    ?>
    <form action="#">
        <table>
            <tr>
                <td>
                    Mã lớp: 
                </td>
                <td>
                    <select name="Class">
                        <option value="61.CNTT-1" selected>61.CNTT-1</option>
                        <option value="61.CNTT-2">61.CNTT-2</option>
                        <option value="62.TTQL">62.TTQL</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td>
                    <input type="radio" name="Gender" value="Nam" checked>Nam
                    <input type="radio" name="Gender" value="Nữ">Nữ
                </td>
            </tr>
            <tr>
                <td>Mã sinh viên: </td>
                <td>
                    <input type="text" name="MaSV" value="<?=$MaSV?>">
                </td>
            </tr>
            <tr>
                <td>Họ tên SV: </td>
                <td>
                    <input type="text" name="TenSV" value="<?=$TenSV?>">
                </td>
            </tr>
            <tr>
                <td>Ngày sinh: </td>
                <td>
                    <input type="text" value="<?=$NgaySinh?>" name="DateOfBirth">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="Submit" value="Thêm sinh viên">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
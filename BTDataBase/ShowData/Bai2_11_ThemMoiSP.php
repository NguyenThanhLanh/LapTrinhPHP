<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sản phẩm</title>
    <style>

    </style>
</head>

<body>
    <?php
        include 'ConnectDatabase.php';
        $MaSua = '';
        $TenSua = '';
        $HangSua = '';
        $LoaiSua = '';
        $TrongLuong = '';
        $DonGia = '';
        $TPDinhDuong = '';
        $LoiIch = '';
        $path_Img = '';
            
        $sql_listHangSua = 'SELECT * FROM `hang_sua` WHERE 1';
        $listHangSua = mysqli_query($conn, $sql_listHangSua);

        $sql_LoaiSua = 'SELECT * FROM `loai_sua` WHERE 1';
        $listLoaiSua = mysqli_query($conn, $sql_LoaiSua);

        

        if (isset($_REQUEST['Submit'])) {
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];

            $MaSua = trim($_REQUEST['MaSua']);
            $TenSua = trim($_REQUEST['TenSua']);
            $HangSua = trim($_REQUEST['HangSua']);
            $LoaiSua = trim($_REQUEST['LoaiSua']);
            $TrongLuong = trim($_REQUEST['TrongLuong']);
            $DonGia = trim($_REQUEST['DonGia']);
            $TPDinhDuong = trim($_REQUEST['TPDinhDuong']);
            
            $LoiIch = trim($_REQUEST['LoiIch']);
            print_r($_FILES['image']);
            print_r($_FILES['image']);
            print_r($MaSua);
            print_r($TenSua);
            print_r($HangSua);
            print_r($LoaiSua);
            print_r($TrongLuong);
            print_r($DonGia);
            print_r($TPDinhDuong);
            print_r($LoiIch); exit;

            $sql_ThemSP = `insert into sua (Ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh)
                    value($MaSua, $ten_sua, $HangSua, $LoaiSua, $TrongLuong, $DonGia, $TPDinhDuong, $LoiIch, $image);`;
            $ThemSua = mysqli_query($conn, $sql_ThemSP);
            move_uploaded_file($image_tmp, 'access/Img_Sua/Hinh_sua/Hinh_sua/'.$image);
            header('location: Bai2_6_ListDangCot.php');
        }


    ?>
    <div class="AddNewProduct">
        <h3 class="AddNewProduct__Header">Thêm sữa mới</h3>
        <div class="AddNewProduct__Body">
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Mã sữa: </td>
                        <td>
                            <input type="text" name="MaSua" class="IP_Val" id="IP_MaSua">
                        </td>
                    </tr>
                    <tr>
                        <td>Tên sữa: </td>
                        <td>
                            <input type="text" name="TenSua" class="IP_Val" id="IP_TenSua">
                        </td>
                    </tr>
                    <tr>
                        <td>Hãng sữa: </td>
                        <td>
                            <select name="HangSua" id="IP_HangSua">
                                <?php while($row = mysqli_fetch_assoc($listHangSua)):?>
                                    <option value="<?=$row['Ma_hang_sua']?>"><?=$row['Ten_hang_sua']?></option>
                                <?php endwhile?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Loại sữa: </td>
                        <td>
                            <select name="LoaiSua" id="IP_LoaiSua">
                                <?php while($row = mysqli_fetch_assoc($listLoaiSua)):?>
                                    <option value="<?=$row['Ma_loai_sua']?>"><?=$row['Ten_loai']?></option>
                                <?php endwhile?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Trọng lượng: </td>
                        <td>
                            <input type="text" name="TrongLuong" class="IP_Val" id="IP_TrongLuong"> (gr hoặc ml)
                        </td>
                    </tr>
                    <tr>
                        <td>Đơn giá: </td>
                        <td>
                            <input type="text" name="DonGia" class="IP_Val" id="IP_DonGia"> (VND)
                        </td>
                    </tr>
                    <tr>
                        <td>Thành phần dinh dưỡng: </td>
                        <td>
                            <textarea type="text" name="TPDinhDuong" class="IP_Val" id="IP_TPDinhDuong"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Lợi ích: </td>
                        <td>
                            <textarea type="text" name="LoiIch" class="IP_Val" id="IP_LoiIch"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Hình ảnh: </td>
                        <td>
                            <input type="file" name="image" id="image">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Thêm sản phẩm" name="Submit">
                        </td>
                    </tr>
                </table>
                
            </form>
        </div>
    </div>
</body>

</html>
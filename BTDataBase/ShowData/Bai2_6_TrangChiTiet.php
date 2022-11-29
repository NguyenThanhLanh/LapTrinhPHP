<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chi tiết sản phẩm</title>
    <style>
        .main {
            width: 608px;
            margin: auto;
            text-align: justify;
        }

        td {
            padding: 0 10px;
            border: 1px solid #ccc;
        }

        table {
            border: 1px solid #ccc;
        }

        h3 {
            text-align: center;
        }

        .header_product {
            background-color: bisque;
        }
        .title_Product{
            font-weight: bold;
        }

        .footer{
            text-align: right;
        }
        .Back{
            margin-right: 10px;
        }
        
    </style>
</head>

<body>
    <?php
    if (!empty($_GET['id'])) {
        $idProduct = $_GET['id'];
    } else {
        echo "không có sản phẩm nào cả";
        exit;
    }

    $conn =  mysqli_connect('localhost', 'root', '', 'qlbansua', '3307')
        or die('Không thể kết nổi database' . mysqli_connect_error());

    //Tạo câu truy vấn sp
    $sql = 'select Ma_sua, Ten_sua, Trong_luong, Don_gia,TP_Dinh_Duong, Loi_ich,Hinh FROM sua WHERE Ma_sua = "' . $idProduct . '"';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
    ?>
    <div class="main">
        <table>
            <tr>
                <td colspan="2" class="header_product">
                    <h3><?= $row[1] ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="./access/Img_Sua/Hinh_sua/Hinh_sua/<?= $row[6] ?>" alt="Hình minh họa">
                </td>
                <td>
                    <div class="title_Product">
                        Thành phần dinh dưỡng
                    </div>
                    <p><?= $row[4] ?></p>
                    <div class="title_Product">
                        Lợi ích
                    </div>
                    <p><?= $row[5] ?></p>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="footer"><a href="javascript:window.history.back(-1);" class="Back">Quay lại</a></td>
            </tr>

        </table>
    </div>
</body>

</html>
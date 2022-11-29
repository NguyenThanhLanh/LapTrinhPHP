<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List đơn giản</title>
    <style>
        .Product_img {
            width: 60px;
        }

        .Product_img_wrap{
            border-right: 1px solid #ccc;
        }

        table {
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #ccc;
        }

        td, tr{
            margin: 0;
        }

        .main {
            text-align: center;
        }

        .headerItem {
            color: red;
            font-weight: bold;
        }

        h4 {
            margin: 40px 0px 5px;
            text-align: left;
        }

        .detail_product {
            margin: 0;
            text-align: left;
        }

        .info_product {
            margin-bottom: 18px;
            min-width: 272px;
            margin-left: 12px;
        }
        a {
            display: inline-block;
            width: fit-content;
            padding: 0 4px;
            border: 1px solid #000;
            text-decoration: none;
            text-align: center;
            margin: 2px;
            color: #000;
        }
        .phantrang{
            text-align: center;
            margin-top: 10px;
        }
        .selected{
            background-color: #000;
            color: #fff;
        }
    </style>
</head>

<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua', '3307')
        or die('Không thể kết nối database' . mysqli_connect_error());

    $QuantityItemPage  = !empty($_GET['per_page']) ? $_GET['per_page'] : 2;
    $Current_Page = !empty($_GET['page']) ? $_GET['page'] : 1;

    $offset = ($Current_Page - 1) * $QuantityItemPage;
    $sql = 'SELECT s.Ten_sua, hs.Ten_hang_sua, s.TP_Dinh_Duong, s.Loi_ich,s.Trong_luong,s.Don_gia, s.Hinh 
                    FROM sua AS s INNER JOIN hang_sua AS hs ON hs.Ma_hang_sua=s.Ma_hang_sua LIMIT ' . $offset . ',' . $QuantityItemPage;
                    
    $listProduct = mysqli_query($conn, $sql);

    $AllProductSQL = 'SELECT * FROM sua';
    $ListTotal_Product = mysqli_query($conn,$AllProductSQL);
    $totalPages = ceil($ListTotal_Product->num_rows / $QuantityItemPage);
    ?>
    <div class="main">
        <h2>Thông tin các sản phẩm</h2>
        <table>
            <?php while ($row = mysqli_fetch_array($listProduct)) : ?>
                <table>
                    <tr>
                        <td class="Product_img_wrap"><img class="Product_img" src="./access/Img_Sua/Hinh_sua/Hinh_sua/<?= $row['Hinh'] ?>" alt="Hình sữa minh họa"></td>
                        <td>
                            <div class="info_product">
                                <h4><?= $row['Ten_sua'] ?></h4>
                                <p class="detail_product">Nhà sản xuất: <?= $row['Ten_hang_sua'] ?></p>
                                <p class="detail_product">Sữa bột - <?= $row['Trong_luong'] ?> - <?= $row['Don_gia'] ?> VND</p>
                            </div>
                        </td>
                    </tr>
                </table>
            <?php endwhile; ?>
        </table>
        <?php
            include './Bai2_4_LuoiPhanTrang2.php';
        ?>
    </div>
</body>

</html>
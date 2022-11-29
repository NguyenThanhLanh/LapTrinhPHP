<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List dạng cột</title>
    <style>
        .main{
          text-align: center;  
        }
        .Product_name {
            display: block;
            text-align: center;
            color: cornflowerblue;
        }

        table{
            margin: auto;
        }
        th{
            background-color: #a7dff3;
        }

        .Item_product {
            text-align: center;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            width: 160px;
        }
        .Item_product:first-child{
            border-left: 1px solid #ccc;

        }
        .Item_product:last-child{
            border-right: 1px solid #ccc;
        }

        .Item_product + .Item_product{
            border-left: 1px solid #ccc;
        }

        img{
            width: 100%;
            height: 180px;  
        }
        .sub_title_product {
            display: block;
            font-family: monospace;
            margin: 5px 0px;
        }
        /* a {
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
        } */
    </style>
</head>

<body>
    <?php
    //Connect database
    $conn =  mysqli_connect('localhost', 'root', '', 'qlbansua', '3307')
        or die('Không thể kết nổi database' . mysqli_connect_error());

    //Tạo câu truy vấn SQL
    $QuantityItemPage = !empty($_GET['per_page']) ? $_GET['per_page'] : 10; //số lượng phần tử trên 1 page
    $Current_Page = !empty($_GET['page']) ? $_GET['page'] : 1; //trang hiện hành

    //Tính tổng số sản phẩm 
    $listProductSQL = 'select * FROM sua;';
    $totalProduct = mysqli_query($conn,  $listProductSQL)->num_rows;
    $totalPages = ceil($totalProduct / $QuantityItemPage);
    $offset = ($Current_Page - 1) * $QuantityItemPage;
    $sql = 'SELECT Ma_sua, Ten_sua, Trong_luong, Don_gia, Hinh FROM sua WHERE 1=1 LIMIT ' . $offset . ',' . $QuantityItemPage;
    $result = mysqli_query($conn, $sql);
    ?>
</body>
<div class="main">
    <table>
        <th colspan="5"><h3>THÔNG TIN SẢN PHẨM</h3></th>
        <tbody>
            <tr>
                <?php
                $count = 1;
                while ($row = mysqli_fetch_row($result)) : ?>
                    <td class="Item_product">
                        <a href="./Bai2_6_TrangChiTiet.php?id=<?=$row[0]?>" class="Product_name"><?= $row[1] ?></a>
                        <span class="sub_title_product"><?= $row[2] ?> gr - <?= $row[3] ?> VND</span>
                        <img src="./access/Img_Sua/Hinh_sua/Hinh_sua/<?= $row[4] ?>" alt="Ảnh sữa">
                    </td>
                    <?php if ($count % 5 == 0) : ?>
            </tr>
        <?php endif; ?>
        <?php if ($count == 5) : ?>
            <tr>
            <?php endif; ?>
        <?php $count++;
                endwhile; ?>
            </tr>
        </tbody>
    </table>
    <?php
        include './Bai2_4_LuoiPhanTrang2.php';
    ?>
</div>

</html>
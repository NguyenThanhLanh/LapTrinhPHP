<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lưới phân trang</title>
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #ccc;
        }

        td,
        th {
            border: 1px solid #ccc;
        }

        .main {
            text-align: center;
        }

        .headerItem {
            color: red;
            font-weight: bold;
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

    // phân trang

    //print_r($_GET); exit;
    $QuantityItemPage = !empty($_GET['per_page']) ? $_GET['per_page'] : 4; // so ban ghi tren mot trang
    $Current_Page = !empty($_GET['page']) ? $_GET['page'] : 1;  // trang hien tai
    $offset = ($Current_Page - 1) * $QuantityItemPage; //phantu offset =  
    $sql =  'SELECT Ten_sua, hs.Ten_hang_sua, ls.Ten_loai , Trong_luong, Don_gia 
                FROM sua AS s INNER JOIN hang_sua AS hs on hs.Ma_hang_sua = s.Ma_hang_sua 
                INNER JOIN loai_sua AS ls ON ls.Ma_loai_sua=s.Ma_loai_sua LIMIT ' . $Current_Page . ',' . $QuantityItemPage;

    $product = mysqli_query($conn, $sql);

    //Tinh tong so trang
    $totalProductSql = 'SELECT * FROM sua'; // tao cau sql lay tat ca san pham
    $ListProduct = mysqli_query($conn, $totalProductSql); // Lay ra danh sach san pham do
    $totalProduct = $ListProduct->num_rows; //lay ra so luong cua danh sach tren
    $totalPages = ceil($totalProduct / $QuantityItemPage); // Tong so trang lam tron len


    ?>
    <div class="main">
        <h3>Thông tin sữa</h3>
        <table>
            <tr>
                <th class="headerItem">Số TT</th>
                <th class="headerItem">Tên sữa</th>
                <th class="headerItem">Hãng sữa</th>
                <th class="headerItem">Loại sữa</th>
                <th class="headerItem">Trọng lượng</th>
                <th class="headerItem">Đơn giá</th>
            </tr>
            <?php
            $stt = 1;
            while ($row = mysqli_fetch_row($product)) :
                $color = ($stt % 2) ? '#fa778f' : '#fff';
            ?>
                <tr>
                    <td style="background-color: <?php echo $color ?>;"><?= $stt ?></td>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $row[0]; ?></td>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $row[1]; ?></td>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $row[2]; ?></td>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $row[3]; ?></td>
                    <td style="background-color: <?php echo $color ?>;"><?php echo $row[4]; ?> VND</td>
                </tr>
            <?php $stt++;
            endwhile; ?>
        </table>
    </div>
    <div class="phantrang">
        <?php
        include './Bai2_4_LuoiPhanTrang2.php';
        ?>
    </div>
</body>

</html>
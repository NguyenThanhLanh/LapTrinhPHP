<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm sản phẩm</title>
    <style>
        .Product {
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
            margin: auto;
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
        img{
            width: 200px;
        }
    </style>
</head>

<body>
    <?php
    $searchVal = '';
    $CountResult = 0;
    include 'ConnectDatabase.php';
    if (isset($_REQUEST['Submit'])) {
        $searchVal = trim($_REQUEST['ValSearch']);
        
        $sql = 'select Ma_sua, Ten_sua, Trong_luong, Don_gia,TP_Dinh_Duong, Loi_ich,Hinh FROM sua WHERE Ten_sua LIKE "%' . $searchVal . '%"';

        $result = mysqli_query($conn, $sql);
        $CountResult = mysqli_num_rows($result);
    }
    ?>
    <form style="text-align: center;" action="">
        <fieldset style="width: fit-content; text-align: center;">
            <legend>
                <h3>Tìm kiếm thông tin sữa</h3>
            </legend>
            <div class="Search">
            <label for="ValSearch">Tên sữa: </label>
                    <input type="text" class="Inp_Search_Val" name="ValSearch" value="<?=$searchVal?>">
                    <input type="submit" value="Tìm kiếm" name="Submit">
            </div>
            <?php if ($CountResult > 0  && isset($_REQUEST['Submit'])) : ?>
                <span>
                    <h4 style="margin:2px 0 6px ;">Có <?= $CountResult ?> sản phẩm được tiềm thấy!</h4>
                </span>
                <?php while ($row = mysqli_fetch_row($result)) : ?>
                    <div class="Product">
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
                        </table>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <span>
                    <h4 style="margin:2px 0 6px ;">Có <?= $CountResult ?> sản phẩm được tiềm thấy!</h4>
                </span>
            <?php endif; ?>

        </fieldset>
    </form>
</body>

</html>
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

        .title_Product {
            font-weight: bold;
        }

        .footer {
            text-align: right;
        }

        img {
            width: 200px;
        }
    </style>
</head>

<body>
    <?php
    include 'ConnectDatabase.php';
    $searchVal = '';
    $CountResult = 0;
    $tenhangVal = '';
    $tenloaiVal = '';

    //lấy ra tên loại sữa
    $tenloai = 'SELECT Ten_loai FROM `loai_sua` WHERE 1';
    $resultTenLoai = mysqli_query($conn, $tenloai);

    //lấy ra ten hãng sữa
    $tenhang = 'SELECT Ten_hang_sua FROM `hang_sua` WHERE 1';
    $resultTenHang = mysqli_query($conn, $tenhang);

    //

    if (isset($_REQUEST['Submit'])) {
        $searchVal = trim($_REQUEST['ValSearch']);
        $tenhangVal = $_REQUEST['HangSua'];
        $tenloaiVal = $_REQUEST['Class'];
        $sql = 'SELECT * FROM sua as s INNER JOIN hang_sua as hs ON hs.Ma_hang_sua = s.Ma_hang_sua 
        INNER JOIN loai_sua as ls ON ls.Ma_loai_sua = s.Ma_loai_sua
        WHERE Ten_sua LIKE "%' . $searchVal . '%"'.' AND Ten_loai LIKE "%'.$tenloaiVal.'%" AND ten_hang_sua LIKE "%'.$tenhangVal.'%"';
        

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
                <div class="Name">
                    <label for="ValSearch">Tên sữa: </label>
                    <input type="text" class="Inp_Search_Val" name="ValSearch" value="<?= $searchVal ?>">

                </div>
                <div class="Optional">
                    <div class="classMilk" style="margin-top: 6px;">
                        <label for="Class">Loại sữa: </label>
                        <select name="Class">
                            <?php while ($row = mysqli_fetch_row($resultTenLoai)) : ?>
                                <option value="<?= $row[0] ?>"><?= $row[0] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="manufacturer" style="margin-top: 6px;">
                        <label for="HangSua">Hãng sữa: </label>
                        <select name="HangSua">
                            <?php while ($row = mysqli_fetch_row($resultTenHang)) : ?>
                                <option value="<?= $row[0] ?>"><?= $row[0] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                </div>
                <input type="submit" value="Tìm kiếm" name="Submit" style="margin-top: 6px;">
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
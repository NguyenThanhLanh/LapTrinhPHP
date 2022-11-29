<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
</head>

<body>
    <?php
    abstract class NhanVien
    {
        public $Name_NV, $DiaChi, $GioiTinh;
    }
    ?>
    <form action="" method="post">
        <fieldset style="width: fit-content;">
            <legend>Quản Lý thông tin GV SV</legend>
            <table>
                <tbody>
                    <tr>
                        <td>Họ tên: </td>
                        <td>
                            <input type="text" name="name">
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ: </td>
                        <td>
                            <input type="text" name="address">
                        </td>
                    </tr>
                    <tr>
                        <td>Giới tính: </td>
                        <td>
                            <input type="radio" name="rad" value="Nam">Nam
                            <input type="radio" name="rad" value="Nữ">Nữ
                        </td>
                    </tr>
                    <tr>
                        <td>Chọn đối tượng: </td>
                        <td>
                            <input type="radio" name="rad1" value="GV">Giáo Viên
                            <input type="radio" name="rad1" value="SV">Sinh Viên
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>Giáo Viên</legend>
                                <table>
                                    <tr>
                                        <td>Trình độ: </td>
                                        <td>
                                            <select name="trinhDo" id="">
                                                <option value="daiHoc">Đại học</option>
                                                <option value="thacSi">Thạc Sĩ</option>
                                                <option value="tienSi">Tiến sĩ</option>\
                                            </select>
                                        </td>
                                    </tr>
                                    <td>Lương cở bản: </td>
                                    <td>
                                        <input type="number" name="num">
                                    </td>
                                </table>
                            </fieldset>
                        </td>
                        <td>
                            <fieldset>
                                <legend>Sinh Viên</legend>
                                <table>
                                    <tr>
                                        <td>Lớp học: </td>
                                        <td>
                                            <input type="text" name="class">
                                        </td>
                                    </tr>
                                    <td>Ngành: </td>
                                    <td>
                                        <select name="nganh" id="">
                                            <option value="cntt">CNTT</option>
                                            <option value="cntp">CNTP</option>
                                            <option value="nna">NNA</option>
                                        </select>
                                    </td>
                                </table>
                            </fieldset>
                        </td>
                    </tr>

                </tbody>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" value="Xử lý" />
                    </td>
                </tr>
            </table>

        </fieldset>
    </form>
</body>

</html>
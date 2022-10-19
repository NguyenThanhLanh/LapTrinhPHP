<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        //check name
        if (isset($_POST['HoTen'])) {
            $UserName = $_POST['HoTen'];
        }
        else
            $UserName = "";
        // ===========================
        if (isset($_POST['DiaChi'])) {
            $Address = $_POST['DiaChi'];
        }
        else
            $Address = "";
        // ==============================
        if (isset($_POST['SoDienThoai'])) {
            $PhoneNumber = $_POST['SoDienThoai'];
        }
        else
            $PhoneNumber = "";
        // ==============================
        if (isset($_POST['GioiTinh'])) {
            $Gender = $_POST['GioiTinh'];
        }
        else
            $Gender = "Nam";
        // ==============================
        if (isset($_POST['QuocTich'])) {
            $Nationality = $_POST['QuocTich'];
        }
        else
            $Nationality = "VietNam";
        // ==============================
        if (isset($_POST['Subject'])) {
            $Subject = $_POST['Subject'];
        }
        else
            $Subject = [];
        //================================

        
    ?>
    <form action="Bai4_NhanVaXuLyThongTin_2.php" method="POST">
        <div class="main ">
            <fieldset style=" width: fit-content;">
                <legend class="main__HeaderForm">Enter your information</legend>
                <table class="main__BodyForm">
                    <tr>
                        <td><label class="main__Body__Lable_Form">Họ tên:</label></td>
                        <td><input type="text" class="main__Body__Input_UserInfo--Text" name="HoTen"></td>
                    </tr>
                    <tr>
                        <td><label class="main__Body__Lable_Form">Địa chỉ:</label></td>
                        <td><input type="text" class="main__Body__Input_UserInfo--Text" name="DiaChi"></td>
                    </tr>
                    <tr>
                        <td><label class="main__Body__Lable_Form">Số điện thoại:</label></td>
                        <td><input type="text" class="main__Body__Input_UserInfo--Text" name="SoDienThoai"></td>
                    </tr>
                    <tr>
                        <td><label class="main__Body__Lable_Form">Giới tính:</label></td>
                        <td>
                            <input type="radio" class="main__Body__Input_UserInfo--Radio" value="Nam" checked name="GioiTinh">Nam
                            <input type="radio" class="main__Body__Input_UserInfo--Radio" value="Nu" name="GioiTinh">Nu
                        </td>
                    </tr>
                    <tr>
                        <td><label class="main__Body__Lable_Form">Quốc tịch:</label></td>
                        <td>
                            <select class="main__Body__Input_UserInfo--Select" name="QuocTich">
                                <option value="VietNam">Việt Nam</option>
                                <option value="HanQuoc">Hàn Quốc</option>
                                <option value="NhatBan">Nhật Bản</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="main__Body__Lable_Form">Các môn đã học:</label></td>
                        <td>
                            <input type="checkbox" class="main__Body__Input_UserInfo--CheckBox" name="Subject[]" value="PHP and MySQL">PHP & My SQL
                            <input type="checkbox" class="main__Body__Input_UserInfo--CheckBox" name="Subject[]" value="C#">C#
                            <input type="checkbox" class="main__Body__Input_UserInfo--CheckBox" name="Subject[]" value="XML">XML
                            <input type="checkbox" class="main__Body__Input_UserInfo--CheckBox" name="Subject[]" value="Python">Python
                        </td>
                    </tr>
                    <tr>
                        <td><label class="main__Body__Lable_Form">Ghi chú:</label></td>
                        <td>
                            <textarea name="GhiChu" class="main__Body__Input_UserInfo--Textarea"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            <input type="submit" class="main__Body__Input_UserInfo--Submit" name="Submit" value="Gửi">
                            <button formaction="#">Hủy</button>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>
    </form>
</body>

</html>
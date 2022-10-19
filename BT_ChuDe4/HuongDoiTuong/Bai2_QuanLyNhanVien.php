<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thông tin nhân viên</title>
    <style>
        input[type = 'text']{
            width: -webkit-fill-available;
        }
        td{
            background-color: #ffffcc;
        }
    </style>
</head>
<body>
    <?php

use NhanVien as GlobalNhanVien;

        abstract class NhanVien{
            protected $name;
            protected $gender;
            protected $date_start;
            protected $hesoluong;
            protected $quantity_child;
            const salary_basic = 2000000;
            abstract protected function TinhTienLuong();
            abstract protected function TinhTroCap();
            public function TinhTienThuong()
            {
                if (strpos($this->date_start,'-')) {
                    $year = explode('-', $this->date_start)[2];
                }
                else{
                    $year = explode('/', $this->date_start)[2];
                }

                return (date("Y") - $year) * 1000000;
            }
            
        }

        class NVVanPhong extends GlobalNhanVien{
            private $day_off;
            const DinhMucVang = 7;
            const DonGiaPhat = 500000; 
            public function __construct($name, $gender, $dateStart, $hesoluong, $quantity_child, $day_off) {
                $this->name = $name;
                $this-> gender = $gender;
                $this-> date_start = $dateStart;
                $this-> hesoluong = $hesoluong;
                $this->quantity_child = $quantity_child;
                $this->day_off= $day_off;
            }

            public function getDay_off()
            {
                return $this->day_off;
            }          
            public function setDay_off($day_off)
            {
                $this->day_off = $day_off;
                return $this;
            }

            public function getName()
            {
                return $this->name;
            }
            public function setName($name)
            {
                $this->name = $name;
                return $this;
            }

            public function getGender()
            {
                return $this->gender;
            }
            public function setGender($gender)
            {
                $this->gender = $gender;
                return $this;
            }

            public function getDate_start()
            {
                        return $this->date_start;
            }
            public function setDate_start($date_start)
            {
                $this->date_start = $date_start;
                return $this;
            }
            public function getHesoluong()
            {
                return $this->hesoluong;
            }
            public function setHesoluong($hesoluong)
            {
                $this->hesoluong = $hesoluong;
                return $this;
            }

            public function getQuantity_child()
            {
                        return $this->quantity_child;
            }
            public function setQuantity_child($quantity_child)
            {
                $this->quantity_child = $quantity_child;
                return $this;
            }

            public function TinhTienPhat(){
                if ($this->day_off > self::DinhMucVang) {
                    return ($this->day_off - self::DinhMucVang) * self::DonGiaPhat;
                }
                return 0;
            }

            public function TinhTienLuong(){
                return self::salary_basic * $this->hesoluong - $this->TinhTienPhat();
            }

            public function TinhTroCap()
            {
                if ($this->gender == 'Nu') {
                    return $this->quantity_child * 200000 * 1.5;
                }
                else{
                    return $this->quantity_child * 200000;
                }
            }
        }

        class NVSanXuat extends GlobalNhanVien{
            private $QuantityProduct;
            const DinhMucSP = 5000;
            const DonGiaSP = 10000;
            public function __construct($name, $gender, $dateStart, $hesoluong, $quantity_child, $QuantityProduct)
            {
                $this->name = $name;
                $this-> gender = $gender;
                $this-> date_start = $dateStart;
                $this-> hesoluong = $hesoluong;
                $this->quantity_child = $quantity_child;
                $this->QuantityProduct = $QuantityProduct;
            }

            public function getName()
            {
                return $this->name;
            }
            public function setName($name)
            {
                $this->name = $name;
                return $this;
            }

            public function getGender()
            {
                return $this->gender;
            }
            public function setGender($gender)
            {
                $this->gender = $gender;
                return $this;
            }

            public function getDate_start()
            {
                        return $this->date_start;
            }
            public function setDate_start($date_start)
            {
                $this->date_start = $date_start;
                return $this;
            }
            public function getHesoluong()
            {
                return $this->hesoluong;
            }
            public function setHesoluong($hesoluong)
            {
                $this->hesoluong = $hesoluong;
                return $this;
            }

            public function getQuantity_child()
            {
                        return $this->quantity_child;
            }
            public function setQuantity_child($quantity_child)
            {
                $this->quantity_child = $quantity_child;
                return $this;
            }

             public function getQuantityProduct()
            {
                return $this->QuantityProduct;
            }

            public function setQuantityProduct($QuantityProduct)
            {
                $this->QuantityProduct = $QuantityProduct;
                return $this;
            }

            // function
            public function TinhTienThuongSX(){
                if ($this->QuantityProduct > self::DinhMucSP) {
                    return ($this->QuantityProduct - self::DinhMucSP) * self::DonGiaSP * 0.03;
                }
                return 0;
            }
            
            public function TinhTienLuong(){
                return $this->QuantityProduct * self::DonGiaSP + $this->TinhTienThuongSX();
            }
            public function TinhTroCap(){
                return $this->quantity_child *120000;
            }
           
        }

        $IP_Name = '';
        $IP_QuantityChild = '';
        $IP_DateOfBirth = '';
        $IP_DateStartWork = '';
        $IP_Gender = '';
        $IP_SalaryCoefficient = '';
        $IP_KindEmployee= '';
        $IP_AmountDate = '';
        $IP_AmountProduct = '';

        //Result
        $TienLuongStr = '';
        $TienTroCapStr = '';
        $TienThuongStr = '';
        $TienPhatStr = '';
        $TotalMoney = '';

        if (isset($_REQUEST['IP_Name'])) {
            $IP_Name = trim($_REQUEST['IP_Name']);
        }
        if (isset($_REQUEST['IP_QuantityChild'])) {
            $IP_QuantityChild = trim($_REQUEST['IP_QuantityChild']);
        }
        if (isset($_REQUEST['IP_DateOfBirth'])) {
            $IP_DateOfBirth = trim($_REQUEST['IP_DateOfBirth']);
        }
        if (isset($_REQUEST['IP_DateStartWork'])) {
            $IP_DateStartWork = trim($_REQUEST['IP_DateStartWork']);
        }
        if (isset($_REQUEST['IP_Gender'])) {
            $IP_Gender = trim($_REQUEST['IP_Gender']);
        }
        if (isset($_REQUEST['IP_SalaryCoefficient'])) {
            $IP_SalaryCoefficient = trim($_REQUEST['IP_SalaryCoefficient']);
        }
        if (isset($_REQUEST['IP_KindEmployee'])) {
            $IP_KindEmployee = trim($_REQUEST['IP_KindEmployee']);
        }
        if (isset($_REQUEST['IP_AmountDate'])) {
            $IP_AmountDate = trim($_REQUEST['IP_AmountDate']);
        }
        if (isset($_REQUEST['IP_AmountProduct'])) {
            $IP_AmountProduct = trim($_REQUEST['IP_AmountProduct']);
        }

        if (isset($_REQUEST['Submit'])) {
            if ($IP_KindEmployee != '' && $IP_KindEmployee == 'Office') {
                if ($IP_Name != '' && $IP_Gender != '' && $IP_DateStartWork != ''
                    && $IP_SalaryCoefficient != '' && $IP_AmountDate != '' && $IP_QuantityChild != '') 
                {
                    $NhanVienVP = new NVVanPhong($IP_Name, $IP_Gender, $IP_DateStartWork
                                        ,$IP_SalaryCoefficient, $IP_QuantityChild ,$IP_AmountDate);
                    $TienLuongStr = $NhanVienVP->TinhTienLuong();
                    $TienThuongStr = $NhanVienVP->TinhTienThuong();
                    $TienTroCapStr = $NhanVienVP->TinhTroCap();
                    $TienPhatStr = $NhanVienVP->TinhTienPhat();
                    $TotalMoney = $TienLuongStr + $TienThuongStr +$TienTroCapStr - $TienPhatStr;
                }
                else{
                    echo "<font color = red>Nhập thiếu hoặc sai định dạng form VP!</font>";
                }
            }else 
            {
                if ($IP_KindEmployee != '' && $IP_KindEmployee == 'Production') {
                    if ($IP_Name != '' && $IP_Gender != '' && $IP_DateStartWork!='' 
                        && $IP_SalaryCoefficient != '' && $IP_QuantityChild && $IP_AmountProduct) {
                        $NhanVienSX = new NVSanXuat($IP_Name, $IP_Gender, $IP_DateStartWork
                                            , $IP_SalaryCoefficient, $IP_QuantityChild, $IP_AmountProduct);
                        $TienLuongStr = $NhanVienSX->TinhTienLuong();
                        $TienTroCapStr = $NhanVienSX->TinhTroCap();
                        $TienThuongStr = $NhanVienSX->TinhTienThuong() + $NhanVienSX->TinhTienThuongSX();
                        $TotalMoney = $TienLuongStr + $TienTroCapStr + $TienThuongStr;
                    }
                    else{
                        echo "<font color = red>Nhập thiếu hoặc sai định dạng form SX!</font>";
                    }
                }
                else{
                    echo "<font color = red>Hãy kiểm tra lại form</font>";
                }
            }
        }
    ?>
    <Form style="width: fit-content;">
        <h2 style="text-align: center; background-color: #ccc; margin: 0;">QUẢN LÝ NHÂN VIÊN</h2>
        <table>
            <tr>
                <td>Họ và tên: </td>
                <td>
                    <input type="text" name="IP_Name" value="<?php echo $IP_Name ?>">
                </td>
                <td>Số con: </td>
                <td>
                    <input type="text" name="IP_QuantityChild" value="<?php echo $IP_QuantityChild ?>">
                </td>
            </tr>
            <tr>
                <td>Ngày sinh: </td>
                <td>
                    <input type="text" name="IP_DateOfBirth" value="<?php echo $IP_DateOfBirth ?>">
                </td>
                <td>Ngày vào làm: </td>
                <td>
                    <input type="text" name="IP_DateStartWork" value="<?php echo $IP_DateStartWork ?>">
                </td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td>
                    <input type="radio" name="IP_Gender" value="Nam" checked>Nam
                    <input type="radio" name="IP_Gender" value="Nu">Nữ
                </td>
                <td>Hệ số lương: </td>
                <td>
                    <input type="text" name="IP_SalaryCoefficient" value="<?php echo $IP_SalaryCoefficient ?>">
                </td>
            </tr>
            <tr>
                <td>Loại nhân viên: </td>
                <td>
                    <input type="radio" name="IP_KindEmployee" value="Office" checked> Văn phòng
                </td>
                <td></td>
                <td>
                    <input type="radio" name="IP_KindEmployee" value="Production"> Sản Xuất
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <label for="IP_Amount">Số ngày vắng: </label>
                    <input type="text" name="IP_AmountDate" value="<?php echo $IP_AmountDate ?>">
                </td>
                <td></td>
                <td>
                    <label for="">Số sản phẩm: </label>
                    <input type="text" name="IP_AmountProduct" value="<?php echo $IP_AmountProduct ?>">
                </td>
            </tr>
        </table>
        <div class="btn_region" style="width: 100%; text-align: center; margin-top: 8px;">
            <input type="submit" value="Tính lương" name="Submit">
        </div>

        <fieldset>
            <legend>Kết quả</legend>
            <table style="width: 100%;">
                <tr>
                    <td>
                        <label for="OP_SalaryMoney">Tiền lương: </label>
                    </td>
                    <td>
                        <input type="text" disabled name="OP_SalaryMoney" value="<?php echo $TienLuongStr . ' VND' ; ?>">
                    </td>
                    <td>
                        <label for="">Trợ cấp: </label>
                    </td>
                    <td>
                        <input type="text" disabled name="OP_GrantMoney" value="<?php echo $TienTroCapStr  . ' VND' ;?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="OP_BonusMoney">Tiền thưởng: </label>
                    </td>
                    <td>
                        <input type="text" disabled name="OP_Bonus" value="<?php echo $TienThuongStr . ' VND' ; ?>">
                    </td>
                    <td>
                        <label for="">Tiền phạt: </label>
                    </td>
                    <td>
                        <input type="text" disabled name="OP_Fine" value="<?php echo $TienPhatStr . ' VND' ;?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <label for=""><b>Thực lĩnh: </b></label>
                        <input type="text" disabled name="OP_Total_Money" value="<?php echo $TotalMoney . ' VND' ;?>">
                    </td>
                </tr>
            </table>
        </fieldset>
    </Form>
</body>
</html>
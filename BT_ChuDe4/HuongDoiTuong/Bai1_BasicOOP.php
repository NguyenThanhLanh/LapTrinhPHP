<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hướng đối tượng đơn giản</title>
</head>

<body>
    <?php
        class PeoPle{
            protected $name;
            protected $address;
            protected $gender;

            public function __construct($name, $address, $gender)  // khởi tạo
            {   
                $this->name=$name;
                $this->address = $address;
                $this->gender = $gender;
            }

            public function setName($name){  //đóng gói name
                $this->name = $name;
            }

            public function getName(){
                return $this->name;
            }

            public function setAddress($address){  //đóng gói address
                $this->address = $address;
            }

            public function getAddress(){
                return $this->address;
            }
            public function setGender($gender){  //đóng gói gender
                $this->gender = $gender;
            }

            public function getGender(){
                return $this->gender;
            }

        }

        class GiaoVien extends PeoPle{
            private $trinhdo;
            const SalaryBs = 1500000; 

            public function __construct($name, $address, $gender, $trinhdo)
            {
                $this->name = $name;
                $this->address = $address;
                $this->gender = $gender;
                $this->trinhdo = $trinhdo;
            }

            public function setTrinhDo($trinhdo){
                $this->trinhdo = $trinhdo;
            }

            public function getTrinhDo(){
                return $this->trinhdo;
            }

            public function TinhLuong(){
                switch($this->trinhdo){
                    case 'CuNhan':
                        return self::SalaryBs * 2.34;
                        break;
                    case 'ThacSi':
                        return self::SalaryBs * 3.67;
                        break;
                    case 'TienSi':
                        return self::SalaryBs * 5.66;
                        break;
                    default:
                        return -1;
                }
            }

        }

        class SinhVien extends PeoPle{
            private $LopHoc;
            private $NganhHoc;

            public function __construct($name, $address, $gender, $lop, $nganh)
            {
                $this->name = $name;
                $this->address = $address;
                $this->gender = $gender;
                $this->LopHoc = $lop;
                $this->NganhHoc = $nganh;
            }

            public function setLop($lop){
                $this->LopHoc = $lop;
            }

            public function getLop(){
                return $this->LopHoc;
            }

            public function setNganh($nganh){
                $this->NganhHoc = $nganh;
            }

            public function getNganh(){
                return $this->NganhHoc;
            }

            public function TinhDiemThuong(){
                switch ($this->NganhHoc) {
                    case 'CNTT':
                        return 1;
                        break;
                    case 'KT':
                        return 1.5;
                        break;
                    case 'Khac':
                        return 0;
                        break;
                    default:
                        return -1;
                        break;
                }
            }
        }
        $oop_name = '';
        $oop_address = '';
        $oop_gender = 'Nam';
        $class_oop = 'GiaoVien';
        $gv_trinhdo = 'CuNhan';
        $luongcb = '1.500.000 VND';
        $gv_luong = '';
        $sv_lophoc = '';
        $sv_nganhhoc = '';
        $sv_diemthuong = '';

        // ====================


        if (isset($_REQUEST['Ip_Name'])) {
            $oop_name = trim($_REQUEST['Ip_Name']);
        }

        if (isset($_REQUEST['Ip_Address'])) {
            $oop_address = trim($_REQUEST['Ip_Address']);
        }

        if (isset($_REQUEST['Ip_Gender'])) {
            $oop_gender = trim($_REQUEST['Ip_Gender']);
        }

        if (isset($_REQUEST['ClassOOP'])) {
            $class_oop = trim($_REQUEST['ClassOOP']);
        }

        if (isset($_REQUEST['GV_Position'])) {
            $gv_trinhdo = trim($_REQUEST['GV_Position']);
        }
        
        if (isset($_REQUEST['SV_Profession'])) {
            $sv_nganhhoc = trim($_REQUEST['SV_Profession']);
        }
        
        if (isset($_REQUEST['SV_NameClass'])) {
            $sv_lophoc = trim($_REQUEST['SV_NameClass']);
        }  
        
        if (isset($_REQUEST['Submit'])) {
            if ($class_oop == 'GiaoVien') {
                if ($oop_name != '' && $oop_address != '' 
                    && $oop_gender != '' && $gv_trinhdo != '') 
                {
                    $gv = new GiaoVien($oop_name, $oop_address, $oop_gender, $gv_trinhdo);
                }
                else{
                    echo "<font color = red>Nhập sai định dạng form!</font>" ;
                }
            }
            else{
                if ($oop_name != '' && $oop_address != '' 
                    && $oop_gender != '' && $sv_nganhhoc != '' && $sv_lophoc != '') 
                {
                    $sv = new SinhVien($oop_name, $oop_address, $oop_gender, $sv_lophoc, $sv_nganhhoc);
                }
                else{
                    echo "<font color = red>Nhập sai định dạng form!</font>" ;
                }
            }
        }

        

    ?>
    <Form>
        <fieldset style="width: fit-content;">
            <legend>Quản lý thông tin GV SV</legend>
            <table>
                <tbody>
                    <tr>
                        <td>Họ tên:</td>
                        <td>
                            <input type="text" name="Ip_Name" value="<?php ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ: </td>
                        <td>
                            <input type="text" name="Ip_Address" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Giới tính: </td>
                        <td>
                            <input type="radio" name="Ip_Gender" value="Nam" checked>Nam
                            <input type="radio" value="Nu" name="Ip_Gender">Nữ
                        </td>
                    </tr>
                    <tr>
                        <td>Chọn đối tượng: </td>
                        <td>
                            <input type="radio" name="ClassOOP" id="cls_GV" value="GiaoVien" checked>Giáo viên
                            <input type="radio" name="ClassOOP" id="cls_SV" value="SinhVien">Sinh Viên
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Fieldset>
                                <Legend>Giáo viên</Legend>
                                <table>
                                    <tr>
                                        <td>Trình độ: </td>
                                        <td>
                                            <select name="GV_Position">
                                                <option value="CuNhan" selected>Cử nhân</option>
                                                <option value="ThacSi">Thạc sĩ</option>
                                                <option value="TienSi">Tiến sĩ</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Lương cơ bản: 
                                        </td>
                                        <td>
                                            <input type="text" name="Salary_Basic" disabled value="<?php echo $luongcb?>">
                                        </td>
                                    </tr>
                                </table>
                            </Fieldset>
                        </td>
                        <td>
                            <Fieldset>
                                <Legend>Sinh viên</Legend>
                                <table>
                                    <tr>
                                        <td>Ngành học: </td>
                                        <td>
                                            <select name="SV_Profession">
                                                <option value="CNTT" selected>Công nghệ thông tin</option>
                                                <option value="KT">Kinh tế</option>
                                                <option value="Khac">Các ngành khác</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Lớp học: 
                                        </td>
                                        <td>
                                            <input type="text" name="SV_NameClass" value="">
                                        </td>
                                    </tr>
                                </table>
                            </Fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="Submit" value="Enter">
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <fieldset style="width: fit-content; min-width: 600px;">
            <legend>Kết quả</legend>
            <?php if ($class_oop == 'GiaoVien' && isset($_REQUEST['Submit']) && !empty($gv)):?>
                <table>
                    <tr>
                        <td>Tên giáo viên: </td>
                        <td><?php echo $gv->getName();?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ giáo viên: </td>
                        <td><?php echo $gv->getAddress();?></td>
                    </tr>
                    <tr>
                        <td>Giới tính: </td>
                        <td><?php if($gv->getGender()=='Nu') echo 'Nữ'; else echo 'Nam';?></td>
                    </tr>
                    <tr>
                        <td>Trình độ: </td>
                        <td><?php  echo $gv->getTrinhDo();?></td>
                    </tr>
                    <tr>
                        <td>Lương </td>
                        <td><?php echo $gv->TinhLuong();?></td>
                    </tr>
                </table>
                <?php else :?>
                <?php if ($class_oop == 'SinhVien' && isset($_REQUEST['Submit']) && !empty($sv)):?>
                    <table>
                        <tr>
                            <td>Tên sinh viên: </td>
                            <td><?php echo $sv->getName(); ?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ sinh viên: </td>
                            <td><?php echo $sv->getAddress(); ?></td>
                        </tr>
                        <tr>
                            <td>Giới tính: </td>
                            <td><?php if($sv->getGender()=='Nu') echo 'Nữ'; else echo 'Nam';?></td>
                        </tr>
                        <tr>
                            <td>Ngành học: </td>
                            <td><?php echo $sv->getNganh(); ?></td>
                        </tr>
                        <tr>
                            <td>Lớp: </td>
                            <td><?php echo $sv->getLop(); ?></td>
                        </tr>
                    </table>
                    
                    <?php endif ?>
                <?php endif ?>
        </fieldset>
    </Form>
</body>

</html>
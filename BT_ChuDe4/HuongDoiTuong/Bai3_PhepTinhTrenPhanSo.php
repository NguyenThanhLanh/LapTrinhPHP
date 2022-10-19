<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép tính trên phân số</title>
    <style>
        fieldset{
            margin-top: 8px;
        }
        input[type='Submit']{
            margin-top: 10px;
        }
        input[type='Text']{
            width: -webkit-fill-available;
        }

    </style>
</head>

<body>
    <?php

use LDAP\Result;

        class PhanSo{
            public $tuso;
            public $mauso;

            public function __construct($tuso, $mauso)
            {
                $this->tuso = $tuso;
                $this->mauso = $mauso;
            }

            public function TinhCong(PhanSo $s2){
                $tu = ($this->tuso * $s2->mauso) + ($this->mauso * $s2->tuso);
                $mau = $this->mauso * $s2->mauso;
                $phansomoi = new PhanSo($tu, $mau);
                return $phansomoi;
            }

            public function TinhTru(PhanSo $s2){
                $tu = ($this->tuso * $s2->mauso) - ($this->mauso * $s2->tuso);
                $mau = $this->mauso * $s2->mauso;
                $phansomoi = new PhanSo($tu, $mau);
                return $phansomoi;
            }

            public function TinhNhan(PhanSo $s2){
                $tu = $this->tuso * $s2->tuso;
                $mau = $this->mauso * $s2->mauso;
                $phansomoi = new PhanSo($tu, $mau);
                return $phansomoi;
            }

            public function TinhChia(PhanSo $s2){
                $tu = $this->tuso * $s2->mauso;
                $mauso = $this->mauso * $s2->tuso;
                $phansomoi = new PhanSo($tu, $mauso);
                return $phansomoi;
            }

            public function TimUCLN(){
                $a = abs($this->tuso);
                $b = abs($this->mauso);
                if ($a == 0 || $b == 0) {
                    return $a + $b;
                }

                while($a != $b){
                    if ($a > $b) {
                        $a -= $b ;
                    }
                    else{
                        $b-=$a;
                    }
                }
                return $a;
            }

            public function RutGonPhanSo(){
                $usc = $this->TimUCLN();
                $this->tuso = $this->tuso / $usc; 
                $this->mauso = $this->mauso / $usc;
            }
        }

        $IP_TuSo_1 = '';
        $IP_MauSo_1 = '';
        $IP_TuSo_2 = '';
        $IP_MauSo_2 = '';
        $cal = '';
        $result = '';
        $resultStr = '';

        if (isset($_REQUEST['IP_TuSo_1'])) {
            $IP_TuSo_1 = trim($_REQUEST['IP_TuSo_1']);
        }
        if (isset($_REQUEST['IP_MauSo_1'])) {
            $IP_MauSo_1 = trim($_REQUEST['IP_MauSo_1']);
        }
        if (isset($_REQUEST['IP_TuSo_2'])) {
            $IP_TuSo_2 = trim($_REQUEST['IP_TuSo_2']);
        }
        if (isset($_REQUEST['IP_MauSo_2'])) {
            $IP_MauSo_2 = trim($_REQUEST['IP_MauSo_2']);
        }
        if (isset($_REQUEST['Calculation'])) {
            $cal = trim($_REQUEST['Calculation']);
        }

        if (isset($_REQUEST['Submit'])) {
            if ($IP_TuSo_1 != '' && is_numeric($IP_TuSo_1) && $IP_MauSo_1 != '' && is_numeric($IP_MauSo_1)) {
                $phanso1 = new PhanSo($IP_TuSo_1, $IP_MauSo_1);
                if ($IP_TuSo_2 != '' && is_numeric($IP_TuSo_2) && $IP_MauSo_2 != '' && is_numeric($IP_MauSo_2)) {
                    $phanso2 = new PhanSo($IP_TuSo_2, $IP_MauSo_2);
                    switch ($cal) {
                        case 'Cong':
                            $result = $phanso1->TinhCong($phanso2);
                            $result->RutGonPhanSo();
                            $resultStr = "$phanso1->tuso / $phanso1->mauso  +  $phanso2->tuso / $phanso2->mauso =  $result->tuso / $result->mauso ";
                            break;
                        case 'Tru':
                            $result = $phanso1->TinhTru($phanso2);
                            $result->RutGonPhanSo();
                            $resultStr = "$phanso1->tuso / $phanso1->mauso  -  $phanso2->tuso / $phanso2->mauso =  $result->tuso / $result->mauso ";
                            break;
                        case 'Nhan':
                            $result = $phanso1->TinhNhan($phanso2);
                            $result->RutGonPhanSo();
                            $resultStr = "$phanso1->tuso / $phanso1->mauso  *  $phanso2->tuso / $phanso2->mauso =  $result->tuso / $result->mauso ";
                            break;
                        case 'Chia':
                            $result = $phanso1->TinhChia($phanso2);
                            $result->RutGonPhanSo();
                            $resultStr = "$phanso1->tuso / $phanso1->mauso  /  $phanso2->tuso / $phanso2->mauso =  $result->tuso / $result->mauso ";
                            break;
                        default:
                            echo "<font>Hãy nhập phép tính</font>";
                            break;
                    }
                }
                else{
                    echo "<font>Nhập sai tham số thứ 2</font>";
                }
            }
            else {
                echo "<font>Nhập sai tham số thứ nhất</font>";
            }
        }
        
    ?>
    <Form style="width: fit-content;">
        <fieldset>
            <legend><h3>Chọn các phép tính trên phân số</h3></legend>
            <Fieldset style="background-color: antiquewhite;">
                <legend>
                    <b>Nhập phân số thứ nhất</b>
                </legend>
                <table>
                    <tr>
                        <td>
                            <label for="">Tử số: </label>
                        </td>
                        <td>
                            <input type="text" name="IP_TuSo_1" value="">
                        </td>
                        <td>
                            <label for="">Mẫu số: </label>
                        </td>
                        <td>
                            <input type="text" name="IP_MauSo_1" value="">
                        </td>
                    </tr>
                </table>
            </Fieldset>
            <Fieldset style="background-color: antiquewhite;">
                <legend>
                    <b>Nhập phân số thứ hai</b>
                </legend>
                <table>
                    <tr>
                        <td>
                            <label for="">Tử số: </label>
                        </td>
                        <td>
                            <input type="text" name="IP_TuSo_2" value="">
                        </td>
                        <td>
                            <label for="">Mẫu số: </label>
                        </td>
                        <td>
                            <input type="text" name="IP_MauSo_2" value="">
                        </td>
                    </tr>
                </table>
            </Fieldset>
            <Fieldset style="background-color: aliceblue;">
                <legend>
                   <b> Chọn phép tính</b>
                </legend>
                <table>
                    <tr>
                        <td>
                            <input type="radio" name="Calculation" value="Cong" checked> Cộng
                        </td>
                        <td>
                            <input type="radio" name="Calculation" value="Tru"> Trừ
                        </td>
                        <td>
                            <input type="radio" name="Calculation" value="Nhan"> Nhân
                        </td>
                        <td>
                            <input type="radio" name="Calculation" value="Chia"> Chia
                        </td>
                    </tr>
                </table>
            </Fieldset>
            <input type="submit" value="Kết quả" name="Submit" style="font-size: 14px; padding: 5px 26px;">
            <fieldset style="height: 50px;">
                <legend>Kết quả thực hiện</legend>
                <div class="result" style="text-align: center;">
                    <?php if ($result != '')
                        echo $resultStr;
                    ?>
                </div>
            </fieldset>
        </fieldset>
    </Form>
</body>

</html>
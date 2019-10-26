<?php
include_once '../../../DBConnect.php';
$conn=open();
function getDSTK() { 
    $dspb = array();
    $conn=open();
    if ($conn) {
        $sql = "select * from taikhoan,phongban WHERE phongban.MaPhongBan=taikhoan.MaPhongBan";

        $mysqli_query = mysqli_query($conn, $sql);


        $i = 0;
        while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
            $dspb[$i] = $row;
            $i++;
        }



        close($conn);
    } else {

        echo "Khong ket noi dc den db";
    }

    return $dspb;
}
if(isset($_POST["sua_ID"])&&isset($_POST["sua_mk"])&&isset($_POST["sua_hoten"])&&isset($_POST["sua_email"])&&isset($_POST["sua_sdt"])&&isset($_POST["sua_phongban"]))
{

	$ID = mysqli_real_escape_string($conn, $_POST["sua_ID"]);
	$MK = mysqli_real_escape_string($conn, $_POST["sua_mk"]);
	$HoTen = mysqli_real_escape_string($conn, $_POST["sua_hoten"]);
	$Email = mysqli_real_escape_string($conn, $_POST["sua_email"]);
	$SDT = mysqli_real_escape_string($conn, $_POST["sua_sdt"]);
	$PB = mysqli_real_escape_string($conn, $_POST["sua_phongban"]);
	if($ID==""||$MK==""||$HoTen==""||$Email==""||$SDT==""){
echo 'Bạn không được bỏ trống!';
return false;
	}else{
$query = "UPDATE taikhoan SET MatKhau='$MK',HoTen='$HoTen',Email='$Email',SoDienThoai='$SDT',MaPhongBan=$PB  WHERE ID=$ID ";

if(mysqli_query($conn, $query))
 {
 					 $dstk=getDSTK();
                     foreach($dstk as $value){
                     ?>
                  <tr>
                     <td><?= $value['TenTaiKhoan'];?></td>
                     <td><?=$value['MatKhau']?></td>
                     <td><?=$value['HoTen']?></td>
                     <td><?=$value['Email']?></td>
                     <td><?=$value['SoDienThoai']?></td>
                     <td><?=$value['TenPhongBan']?></td>
                     <td><button onclick="sua(<?=$value['ID']?>,'<?= $value['TenTaiKhoan']?>','<?=$value['MatKhau']?>','<?=$value['HoTen']?>','<?=$value['Email']?>','<?=$value['SoDienThoai']?>','<?=$value['MaPhongBan'];?>')" class="btn btn-warning btn-circle .btn-lg"><i class="fa fa-magic"></i></button></td>
                     <td><button class="btn btn-danger btn-circle .btn-lg xoa" value="<?= $value['ID']?>"><i class="fas fa-trash"></i></button></td>
                  </tr>
                  <?php
                     }

 
  return true;
 }
	}
}
//Them tk

if(isset($_POST["add_TK"])&&isset($_POST["add_mk"])&&isset($_POST["add_hoten"])&&isset($_POST["add_email"])&&isset($_POST["add_sdt"])&&isset($_POST["add_phongban"]))
{

	$TK = mysqli_real_escape_string($conn, $_POST["add_TK"]);
	$MK = mysqli_real_escape_string($conn, $_POST["add_mk"]);
	$HoTen = mysqli_real_escape_string($conn, $_POST["add_hoten"]);
	$Email = mysqli_real_escape_string($conn, $_POST["add_email"]);
	$SDT = mysqli_real_escape_string($conn, $_POST["add_sdt"]);
	$PB = mysqli_real_escape_string($conn, $_POST["add_phongban"]);
	if($TK==""||$MK==""||$HoTen==""||$Email==""||$SDT==""){
echo 'Bạn không được bỏ trống!';
return false;
	}else{
$query = "INSERT INTO taikhoan(TenTaiKhoan,MatKhau,HoTen,Email,SoDienThoai,Level,MaPhongBan) VALUES('$TK','$MK','$HoTen','$Email','$SDT',0,$PB)";
if(mysqli_query($conn, $query))
 {
   					$dstk=getDSTK();
                     foreach($dstk as $value){
                     ?>
                  <tr>
                     <td><?= $value['TenTaiKhoan'];?></td>
                     <td><?=$value['MatKhau']?></td>
                     <td><?=$value['HoTen']?></td>
                     <td><?=$value['Email']?></td>
                     <td><?=$value['SoDienThoai']?></td>
                     <td><?=$value['TenPhongBan']?></td>
                     <td><button onclick="sua(<?=$value['ID']?>,'<?= $value['TenTaiKhoan']?>','<?=$value['MatKhau']?>','<?=$value['HoTen']?>','<?=$value['Email']?>','<?=$value['SoDienThoai']?>','<?=$value['MaPhongBan'];?>')" class="btn btn-warning btn-circle .btn-lg"><i class="fa fa-magic"></i></button></td>
                     <td><button class="btn btn-danger btn-circle .btn-lg xoa" value="<?= $value['ID']?>"><i class="fas fa-trash"></i></button></td>
                  </tr>
                  <?php
                     }
  return true;
 }else{
echo 'Tài khoản đã tồn tại!';
return true;
 }
	}
}

//
if(isset($_POST["del_id"]))
{
 $query = "DELETE FROM taikhoan WHERE ID = '".$_POST["del_id"]."'";
 if(mysqli_query($conn, $query))
 {
   					$dstk=getDSTK();
                     foreach($dstk as $value){
                     ?>
                  <tr>
                     <td><?= $value['TenTaiKhoan'];?></td>
                     <td><?=$value['MatKhau']?></td>
                     <td><?=$value['HoTen']?></td>
                     <td><?=$value['Email']?></td>
                     <td><?=$value['SoDienThoai']?></td>
                     <td><?=$value['TenPhongBan']?></td>
                     <td><button onclick="sua(<?=$value['ID']?>,'<?= $value['TenTaiKhoan']?>','<?=$value['MatKhau']?>','<?=$value['HoTen']?>','<?=$value['Email']?>','<?=$value['SoDienThoai']?>','<?=$value['MaPhongBan'];?>')" class="btn btn-warning btn-circle .btn-lg"><i class="fa fa-magic"></i></button></td>
                     <td><button class="btn btn-danger btn-circle .btn-lg xoa" value="<?= $value['ID']?>"><i class="fas fa-trash"></i></button></td>
                  </tr>
                  <?php
                     }
 }
}
close($conn);
?>
	  


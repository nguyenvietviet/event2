<?php
include_once '../../../DBConnect.php';
function getDSTK_MPB($dd) {
       $link = open();
       $i=0;
       $dstk_mpb = array();
    if ($link) {
        $sql = "select * from taikhoan where MaPhongBan=".$dd;
        $mysqli_query = mysqli_query($link, $sql);

        
        while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
            $dstk_mpb[$i] = $row;
            $i++;
        }
    
        close($link);
    } else {

        echo "Khong ket noi dc den db";
    }
    return $dstk_mpb;
}
$conn=open();
if(isset($_POST["dstk"]))
{

	$dstk=getDSTK_MPB($_POST["dstk"]);
	?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>Tên tài khoản</th>
                     <th>Mật khẩu</th>
                     <th>Họ tên</th>
                     <th>Email</th>
                     <th>Số điện thoại</th>
                     
                     <th>Sửa</th>
                     <th>Xóa</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>Tên tài khoản</th>
                     <th>Mật khẩu</th>
                     <th>Họ tên</th>
                     <th>Email</th>
                     <th>Số điện thoại</th>
                     
                     <th>Sửa</th>
                     <th>Xóa</th>                  
                  </tr>
               </tfoot>
               <tbody>
                  <button class="btn btn-info btn-sm m-1" onclick="load(<?=$_POST["dstk"]?>)" style="width:10%"><i class="fa fa-dot-circle-o"></i>Thêm</button>
                  
            
                  
                  <!-------------------------------<
                     -------------------------------------->
                  <?php
                   
                     foreach($dstk as $value){
                     ?>
                  <tr>
                     <td><?= $value['TenTaiKhoan'];?></td>
                     <td><?=$value['MatKhau']?></td>
                     <td><?=$value['HoTen']?></td>
                     <td><?=$value['Email']?></td>
                     <td><?=$value['SoDienThoai']?></td>
                     <td><button onclick="sua(<?=$value['ID']?>,'<?= $value['TenTaiKhoan']?>','<?=$value['MatKhau']?>','<?=$value['HoTen']?>','<?=$value['Email']?>','<?=$value['SoDienThoai']?>','<?=$value['MaPhongBan'];?>')" class="btn btn-warning btn-circle .btn-lg" id=<?= "Xoa".$value['ID']?>><i class="fas fa-magic"></i></button></td>
                     <td><button class="btn btn-danger btn-circle .btn-lg " onclick="xoa(<?=$value['ID']?>)"><i class="fas fa-trash"></i></button></td>
                  </tr>
                  <?php
                     }
                     
                     ?>
                  <!--------------------------------------------------------------------->
               </tbody>
            </table>

	<?php
}


if(isset($_POST["phongban"])){
function getDSPB() {
   
    $dspb = array();
    $link = open();
    if ($link) {
        $sql = "select * from phongban";

        $mysqli_query = mysqli_query($link, $sql);


        $i = 0;
        while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
            $dspb[$i] = $row;
            $i++;
        }



        close($link);
    } else {

        echo "Khong ket noi dc den db";
    }

    return $dspb;
}


$phongban = mysqli_real_escape_string($conn, $_POST["phongban"]);

$query = "INSERT INTO phongban(TenPhongBan) VALUES('$phongban')";
if(mysqli_query($conn, $query))
 {
            $dspb=getDSPB();
                     foreach($dspb as $value){
                     ?>
                  <tr>
                     <td><?=$value['TenPhongBan']?></td>
                     <td><button class="btn btn-info" onclick="dstk(<?= $value['MaPhongBan']?>)">Thông tin tài khoản</button></td>
                  </tr>
                  <?php
                     }
  return true;
 }else{
echo 'Phòng ban đã tồn tại!';
return true;
 }

}
close($conn);
?>
	  


<?php
include_once '../../../DBConnect.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$conn=open();
if(isset($_POST["ngaytochuc"])&&isset($_POST["tgbatdau"])&&isset($_POST["tgketthuc"])&&isset($_POST["diadiem"])&&isset($_POST["nct"])&&isset($_POST["dvtc"])&&isset($_POST["noidung"])&&isset($_POST["thanhphan"])&&isset($_POST["id"]))
{
$id=addslashes($_POST['id']);

$ngaytochuc=$_POST['ngaytochuc'];
$thoigianbatdau=$_POST['tgbatdau'];
$thoigianketthuc=$_POST['tgketthuc'];
$diadiem=addslashes($_POST['diadiem']);
$thanhphan=addslashes($_POST['thanhphan']);
$nguoichutri=addslashes($_POST['nct']);
$noidung=addslashes($_POST['noidung']);
$donvitochuc=addslashes($_POST['dvtc']);
$then = strtotime($ngaytochuc);
$now = time();
$difference = $then - $now;
$days = floor($difference / (60*60*24) );
if($days<-1){

  echo 'Bạn không được chọn thời gian đã qua! ';
}
else if($thoigianbatdau>$thoigianketthuc){
echo " Thời gian kết thúc phải sau thời gian bắt đầu!!";
}else{
	
$update = "UPDATE sukien SET NgayToChuc='$ngaytochuc', ThoiGianBatDau='$thoigianbatdau',ThoiGianKetThuc='$thoigianketthuc',NoiDung='$noidung',DiaDiem='$diadiem',ThanhPhanThamDu='$thanhphan',NguoiChuTri='$nguoichutri',DonViToChuc='$donvitochuc' WHERE MaSuKien=$id";
if(mysqli_query($conn, $update)){
	
	echo 'Cập nhật thành công!!';
	if(isset($_POST["tptg"])){
	$del="DELETE FROM thanhphan_phongban WHERE MaSuKien=$id";
	$result = mysqli_query($conn, $del);
	
  	foreach ($_POST["tptg"] as $value) {

    	$sql="INSERT INTO thanhphan_phongban(MaPhongBan,MaSuKien) VALUES ($value,$id)";
    	$result = mysqli_query($conn, $sql);
  	}
}
}else{
	echo 'Cập nhật thành thất bại!!';
}
}
}
close($conn);
?>
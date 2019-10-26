<?php
include_once '../../../DBConnect.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$conn=open();
if(isset($_POST["ngaytochuc"])&&isset($_POST["tgbatdau"])&&isset($_POST["tgketthuc"])&&isset($_POST["diadiem"])&&isset($_POST["nct"])&&isset($_POST["dvtc"])&&isset($_POST["noidung"])&&isset($_POST["thanhphan"])&&isset($_POST["ID_Taikhoan"])&&isset($_POST["file"]))
{
$file=addslashes($_POST['file']);
$ID_Taikhoan=addslashes($_POST['ID_Taikhoan']);
$ngaytochuc=addslashes($_POST['ngaytochuc']);
$thoigianbatdau=addslashes($_POST['tgbatdau']);
$thoigianketthuc=addslashes($_POST['tgketthuc']);
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

$ngaytao=date("Y-m-d");
$sql="INSERT INTO sukien(ThoiGianBatDau,ThoiGianKetThuc,DonViToChuc,DiaDiem,NoiDung,ThanhPhanThamDu,NguoiChuTri,FileDinhKem,ID_NguoiTao,NgayTao,NgayToChuc,Duyet) VALUES ('$thoigianbatdau','$thoigianketthuc', '$donvitochuc','$diadiem','$noidung', '$thanhphan', '$nguoichutri','$file',$ID_Taikhoan,'$ngaytao','$ngaytochuc',0)";

if(mysqli_query($conn, $sql)){
echo 'Tạo mới thành công!!';
if(isset($_POST["tptg"])){
	$last_id = mysqli_insert_id($conn);
  foreach ($_POST["tptg"] as $value) {
    $sql="INSERT INTO thanhphan_phongban(MaPhongBan,MaSuKien) VALUES ($value,$last_id)";
    $result = mysqli_query($conn, $sql);
  }
}


}else{
	echo 'Tạo mới thất bại!!';

}
}
}
close($conn);
?>
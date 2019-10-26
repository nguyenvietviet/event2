<?php
if(isset($_FILES['fileupload'])){
$dir='';
if(isset($_POST['taikhoan'])){
	$dir= $_POST['taikhoan']."/";
	
}
$target_dir    = "../../../uploads/".$dir;
if(!is_dir($target_dir)) {
    mkdir($target_dir);
}
//Vị trí file lưu tạm trong server
$target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
$allowUpload   = true;
//Lấy phần mở rộng của file
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$maxfilesize   = 10485760; //(bytes)
////Những loại file được phép upload
$allowtypes    = array("doc", "docx", "pdf", "gif", "jpeg", "jpg", "png","zip","rar","pptx","ppt","xls","xlsx");



if (file_exists($target_file)) {
    echo "File đã tồn tại!";
    $allowUpload = false;
}
// Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
if ($_FILES["fileupload"]["size"] > $maxfilesize)
{
    echo "Không được upload ảnh lớn hơn 10 (MB)!";
    $allowUpload = false;
}

$a=false;
// Kiểm tra kiểu file
$filezip=array('application/x-zip', 'application/zip', 'application/x-zip-compressed','application/force-download','application/octet-stream');
$filerar=array('application/x-rar', 'application/rar','application/x-rar-compressed','application/force-download','application/octet-stream');
foreach($filezip as $zip) {
		if($zip == $_FILES["fileupload"]["type"]) {
			$a = true;
			break;
		}
}
	foreach($filerar as $zip) {
		if($zip == $_FILES["fileupload"]["type"]) {
			$a = true;
			break;
		}
}
if(($_FILES["fileupload"]["type"] == "application/pdf")
|| ($_FILES["fileupload"]["type"] == "image/gif")
|| ($_FILES["fileupload"]["type"] == "image/jpeg")
|| ($_FILES["fileupload"]["type"] == "image/jpg")
|| ($_FILES["fileupload"]["type"] == "application/msword")
|| ($_FILES["fileupload"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
|| ($_FILES["fileupload"]["type"] == "image/pjpeg")
|| ($_FILES["fileupload"]["type"] == "image/x-png")
|| ($_FILES["fileupload"]["type"] == "image/png")
|| ($_FILES["fileupload"]["type"] == "application/vnd.ms-excel")
|| ($_FILES["fileupload"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
|| ($_FILES["fileupload"]["type"] == "application/vnd.openxmlformats-officedocument.presentationml.presentation")
|| ($_FILES["fileupload"]["type"] == "application/vnd.ms-powerpoint")
|| $a==true
&& in_array($imageFileType, $allowtypes))
{
	
}else{
	echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF,XLS,XLSX,DOC,DOCX,PPT,PPTX,PDF,ZIP,RAR!";
	$allowUpload = false;
}

// Check if $uploadOk is set to 0 by an error
if ($allowUpload) {
    if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
    {
        echo basename( $_FILES["fileupload"]["name"]);
       
    }
    else
    {
        echo "Có lỗi xảy ra khi upload file!";
    }
}

}
?>
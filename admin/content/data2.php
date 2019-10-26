<?php
include_once '../../DBConnect.php';
$conn=open();
if(isset($_POST["nguoichutri"]))
{
	$nguoichutri = mysqli_real_escape_string($conn, $_POST["nguoichutri"]);
	if($nguoichutri==""){
echo 'Insert Failed!';
return false;
	}else{
 
 $query = "INSERT INTO nguoichutri(TenNguoiChuTri) VALUES('$nguoichutri')";
 if(mysqli_query($conn, $query))
 {
  echo 'Data Inserted!';
 }
}
}

if(isset($_POST["id"]))
{
 $query = "DELETE FROM nguoichutri WHERE ID = '".$_POST["id"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'Data Deleted!';
 }
}
close($conn);
?>
	  


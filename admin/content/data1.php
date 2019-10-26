<?php
include_once '../../DBConnect.php';
$conn=open();
if(isset($_POST["diadiem"]))
{
	$diadiem = mysqli_real_escape_string($conn, $_POST["diadiem"]);
	if($diadiem==""){
echo 'Insert Failed!';
return false;
	}else{
 
 $query = "INSERT INTO noitochuc(DiaDiem) VALUES('$diadiem')";
 if(mysqli_query($conn, $query))
 {
  echo 'Data Inserted!';
 }
}
}

if(isset($_POST["id"]))
{
 $query = "DELETE FROM noitochuc WHERE ID = '".$_POST["id"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'Data Deleted!';
 }
}
close($conn);
?>
	  


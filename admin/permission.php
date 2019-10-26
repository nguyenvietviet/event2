
<?php
if (isset($_SESSION['user_id']) == false) {
	echo "You must login!!";
	header('Location: http://localhost/event/login.php');
}else {
	
	if (isset($_SESSION['level']) == true) {
		
		$permission = $_SESSION['level'];
	
		if ($permission == '2') {
			
			echo "Bạn không đủ quyền truy cập vào trang này<br>";
			//echo "<a href='http://localhost/event/index.php'> Click để về lại trang chủ</a>";
			exit();
		}else{
			echo "Bạn ";
		}
	}
}
?>
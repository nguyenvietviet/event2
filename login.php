<?php
session_start();
?>
<?php
include_once './DBConnect.php';

if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
	$username = $_POST["username"];
	$password = $_POST["password"];
	//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
	//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);
	if ($username == "" || $password =="") {
		echo "Username hoặc password bạn không được để trống!";
	}else{
		$link=open();
		$sql = "select * from taikhoan  where TenTaiKhoan = '$username' and MatKhau = '$password'";
		$query = mysqli_query($link,$sql);
		$num_rows = mysqli_num_rows($query);
		if ($num_rows!=1) {
			echo $num_rows ;
		}else{
			// Lấy ra thông tin người dùng và lưu vào session
			while ( $data = mysqli_fetch_array($query) ) {
	    		$_SESSION["user_id"] = $data["ID"];
				$_SESSION['username'] = $data["TenTaiKhoan"];
				$_SESSION["email"] = $data["Email"];
				$_SESSION["fullname"] = $data["HoTen"];
				$_SESSION["phone"] = $data["SoDienThoai"];
				$_SESSION["level"] = $data["Level"];
				$_SESSION["pb_id"] = $data["MaPhongBan"];
	    	}
			
			
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
			//header('Location: http://localhost/event/index.php');
		}
        close($link);
 
	}
}

      

?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf8'></meta>
<style>
form{
	width:400px;
	margin:200px 300px;
}
button{
	margin-left:150px;
}
</style>
</head>
<body>
<form method="POST" action="login.php">
<fieldset>
<legend>Login admin</legend>
<label>UserName:</label>
<input type="text" id="username" name="username"><br>
<label>Password    : </label>
<input type="password" id="password" name="password"><br>
<button type="submit" name="btn_submit" id="btn_submit">Login</button>
</fieldset>
</form>


</body>
</html>
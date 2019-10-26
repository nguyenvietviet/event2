<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once '../DBConnect.php';

function getEvents() {
   
    $dsevent = array();
    $link = open();
    if ($link) {
        $sql = "select * from sukien where duyet=0 order by ngaytochuc,ngaytao asc";

        $mysqli_query = mysqli_query($link, $sql);


        $i = 0;
        while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
            $dsevent[$i] = $row;
            $i++;
        }



        close($link);
    } else {

        echo "Khong ket noi dc den db";
    }

    return $dsevent;
}
// function getDD($dd) {
//        $link = open();

// 		$a="";

//     if ($link) {
//         $sql = "select * from noitochuc where id=".$dd;

//         $mysqli_query = mysqli_query($link, $sql);

		
//         while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
//             $a=$row["DiaDiem"];
//         }
	
//         close($link);
//     } else {

//         echo "Khong ket noi dc den db";
//     }

//     return $a;
// }


// function getNCT($dd) {
//        $link = open();

// 		$a="";

//     if ($link) {
//         $sql = "select * from nguoichutri where id=".$dd;

//         $mysqli_query = mysqli_query($link, $sql);

		
//         while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
//             $a=$row["TenNguoiChuTri"];
//         }
	
//         close($link);
//     } else {

//         echo "Khong ket noi dc den db";
//     }

//     return $a;
// }
function getDay($dd) {
   $link = open();
    if ($link) {
        $sql = "select * from sukien where ngaytochuc='".$dd."'";

        $mysqli_query = mysqli_query($link, $sql);
		$rowcount=mysqli_num_rows($mysqli_query);

        close($link);
    } else {

        echo "Khong ket noi dc den db";
    }

    return $rowcount;
}
// function getTPTD($dd,$ddk) {
//        $link = open();
// 		$dsToChuc = array();
// 		$dsCaNhan = array();
//     if ($link) {
//         $sql = "select * from thanhphan_phongban where MaSuKien=".$dd;

//         $mysqli_query = mysqli_query($link, $sql);

// 		$i=0;
//         while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
//             $dsToChuc[$i]=$row;
//             $i++;
//         }
// 		$sql = "select * from thanhphan_taikhoan where MaSuKien=".$dd;

//         $mysqli_query = mysqli_query($link, $sql);

		
//         while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
//             $dsCaNhan[$i]=$row;
//             $i++;
//         }
	
// 	$a="";
// 	foreach($dsToChuc as $ToChuc){
// 		$sql = "select * from phongban where MaPhongBan=".$ToChuc['MaPhongBan'];
// 		$mysqli_query = mysqli_query($link, $sql);
// 		while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
// 			$a.=$row['TenPhongBan'].",";
			
          
//         }
// 	}
	
// 	foreach($dsCaNhan as $CaNhan){
// 		$sql = "select * from taikhoan where ID=".$CaNhan['MaTaiKhoan'];
// 		$mysqli_query = mysqli_query($link, $sql);
// 		while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
// 			$a.=$row['TenTaiKhoan'].",";
			
          
//         }
// 	}
	
// 	$a.=$ddk;
//         close($link);
//     }
//     return $a;
// }
// function getBTC($dd) {
//        $link = open();

       
// $a="";
//     if ($link) {
//         $sql = "select * from sukien where MaSuKien=".$dd;

//         $mysqli_query = mysqli_query($link, $sql);

        
//         while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
//             $a=$row["ThanhPhanToChuc"];
//         }
    
//         close($link);
//     } else {

//         echo "Khong ket noi dc den db";
//     }
//     return $a;
// }
// function getBTC2($dd) {
//        $link = open();

       
// $a="";
//     if ($link) {
//         $sql = "select * from phongban where MaPhongBan=".$dd;

//         $mysqli_query = mysqli_query($link, $sql);

        
//         while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
//             $a=$row["TenPhongBan"];
//         }
    
//         close($link);
//     } else {

//         echo "Khong ket noi dc den db";
//     }
//     return $a;
// }
// ///get DS DD
function getDSDD() {
   
    $dsdd = array();
    $link = open();
    if ($link) {
        $sql = "select * from noitochuc";

        $mysqli_query = mysqli_query($link, $sql);


        $i = 0;
        while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
            $dsdd[$i] = $row;
            $i++;
        }



        close($link);
    } else {

        echo "Khong ket noi dc den db";
    }

    return $dsdd;
}
///get DS NCT
function getDSNCT() {
   
    $dsnct = array();
    $link = open();
    if ($link) {
        $sql = "select * from nguoichutri";

        $mysqli_query = mysqli_query($link, $sql);


        $i = 0;
        while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
            $dsnct[$i] = $row;
            $i++;
        }



        close($link);
    } else {

        echo "Khong ket noi dc den db";
    }

    return $dsnct;
}
///get DS Tài khoản
function getDSTK() {
   
    $dstk = array();
    $link = open();
    if ($link) {
        $sql = "select * from taikhoan";

        $mysqli_query = mysqli_query($link, $sql);


        $i = 0;
        while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
            $dstk[$i] = $row;
            $i++;
        }
        close($link);
    } else {

        echo "Khong ket noi dc den db";
    }

    return $dstk;
}
///get DS PHÒNG BAN
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
//get ds tk theo maPB
function getDSTK_MPB($dd) {
       $link = open();

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
function getDSPB2() {
   
    $dspb = array();
    $link = open();
    if ($link) {
        $sql = "select * from taikhoan,phongban WHERE phongban.MaPhongBan=taikhoan.MaPhongBan";

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
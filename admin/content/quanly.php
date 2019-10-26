<?php
include_once './controller.php';
$dsevent=getEvents();
?>
<?php  
$link=open();
if (isset($_GET['del_id'])) {
$select = "DELETE from sukien where MaSuKien='".$_GET['del_id']."'";
$query = mysqli_query($link, $select);
header ("Location: admin.php");
}

if (isset($_GET['skid'])) {
$select = "UPDATE sukien SET Duyet=1 where MaSuKien='".$_GET['skid']."'";
$query = mysqli_query($link, $select);
header ("Location: admin.php");
}
close($link);
?>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
		  <script language="javascript" type="text/javascript">
        //thanhphan=thanhphan.replace(thanhphan.substr(thanhphan.indexOf('<button'),thanhphan.indexOf('button>')+7-thanhphan.indexOf('<button')), '');
       $(document).ready(function() { 

         $('p button').remove();
        });
 function xoa(delid)
 {
 if(confirm("Bạn muốn xóa sự kiện này!")){
    window.location.href='?page=quanly&del_id=' +delid+'';
    return true;
 }
 }
 function duyet(skid)
 {
 if(confirm("Xác nhận!")){
    window.location.href='?page=quanly&skid=' +skid+'';
    return true;
  
 }
 }
</script>
        <div class="container-fluid">
<div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div></div></div>

 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Danh Sách Sự Kiện</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					            <th width="16%">Ngày tổ chức</th>
          
                      <th width="53%">Nội dung</th>
                     
                      <th width="16%">Người chủ trì</th>
					            
                      <th width="5%">Sửa</th>
          					  <th width="5%">Duyệt</th>
          					   <th width="5%">Xóa</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Ngày tổ chức</th>
                     
                      <th>Nội dung</th>
                      
                      <th>Người chủ trì</th>
					            
                      <th>Sửa</th>
                      <th>Duyệt</th>
                      <th>Xóa</th>
                    </tr>
                  </tfoot>
                  <tbody>
                 
				<!--------------------------------------------------------------------->
					
					
                 <?php
				
				 $a=0;
				// date_default_timezone_set('Asia/Ho_Chi_Minh');
				 $b="";
		foreach($dsevent as $value){
			$NgayToChuc=$value['NgayToChuc'];
			$ngay=strtotime($NgayToChuc);
			$NgayTao=$value['NgayTao'];
			$time = strtotime($NgayTao);
			$BatDau=$value['ThoiGianBatDau'];
			$time1 = strtotime($BatDau);
			$KetThuc=$value['ThoiGianKetThuc'];
			$time2 = strtotime($KetThuc);
			$NoiDung=$value['NoiDung'];
			$DiaDiem=$value['DiaDiem'];
			$NguoiChuTri=$value['NguoiChuTri'];			
			$dsDay=getDay($NgayToChuc);
			$maSK=$value['MaSuKien'];
			$tptd=$value['ThanhPhanThamDu'];
			$dvtc=$value['DonViToChuc'];
      
			?>
			<tr>	  
<?php if($dsDay>=1 && $b!=$NgayToChuc){ $b=$NgayToChuc?>
<td rowspan=<?= $dsDay?> ><?=rebuild_date(' D: d-m-Y',$ngay	)?></td>
<?php }?>				 
					 
        
               <td class="nd"> <strong><?=date('H:i',$time1)?> - <?=date('H:i',$time2)?>: <?=$DiaDiem?></strong><?=$NoiDung?> <strong>TP tham dự: </strong><?= $tptd;?> <strong><?=$dvtc?></strong></td>
           
               <td><?=$NguoiChuTri?></td>

					 
       

					  <td><a href="?page=edit&edit_id=<?php echo $maSK; ?>" alt="edit" class="btn btn-warning btn-circle .btn-lg"><i class="fa fa-magic"></i></a></td>
						<td><button onclick="duyet(<?php echo $maSK;?>)"class="btn btn-success btn-circle .btn-lg"><i class="fas fa-check"></i></button></td>
						<td><button onclick="xoa(<?php echo $maSK;?>)" class="btn btn-danger btn-circle .btn-lg"><i class="fas fa-trash"></i></button></td>
			 </tr>
			<?php
			
		
		}
		
		?>

			  <!--------------------------------------------------------------------->
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
          
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      <!-- End of Footer -->
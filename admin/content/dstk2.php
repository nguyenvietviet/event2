<?php
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
   $dspb=getDSPB();
   
   //Add dia diem
   ?>
<div class="container-fluid">
   
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Địa Điểm</h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <div id="alert_message"></div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>Tên phòng ban</th>
                     <th>Quản lý tài khoản</th>
                  </tr>
               </thead>
               
               <tbody>
                  <button class="btn btn-info btn-sm m-1" onclick="addphongban();" style="width:10%"><i class="fa fa-dot-circle-o"></i>Thêm</button>
                  <div id="idd">
                       <div class="row" style="display:none" id="ha">
                        <div class="col-md-3" style="margin-bottom: 5px; margin-top: 6px;">
                          <input class="form-control" type="text" id="them">
                        </div>
                       <button class="btn btn-primary btn-sm m-1" type="submit" name="submit" id="insert"><i class="fas fa-plus-circle"> Thêm</i></button>
                      </div>
                    </div>
                 
                     <?php foreach ($dspb as $value) { ?>
                     	
                     <div id='loaddata'>
                  <tr>
                  	<td><?=$value['TenPhongBan']?></td>
                     <td><button class="btn btn-info" value="<?=$value['TenPhongBan']?>" onclick="dstk(<?= $value['MaPhongBan']?>)">Thông tin tài khoản</button></td>
                  </tr>
                </div>
                  <?php }?>
                  <!--------------------------------------------------------------------->
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sửa Tài Khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div id="alert_message2"></div>
      <div class="row">
                  <div class="col-md-3 mb-3">
                     
                     <label>Tên tài khoản:</label><b id="TenTaiKhoan"></b>
                  </div>
      </div>
      <div class="row">
                  <div class="col-md-6 mb-6">
                     
                     <label>Mật khẩu:</label><input class="form-control" type="text" name="matkhau" id="matkhau" value="">
                  </div>
                  <div class="col-md-6 mb-6">
                     
                     <label>Họ tên:</label><input class="form-control" type="text" name="hoten" id="hoten" value="">
                  </div>
      </div>
      <div class="row">
                  <div class="col-md-6 mb-6">
                     
                     <label>Số điện thoại:</label><input class="form-control" type="text"  id="sodienthoai" name="sodienthoai" value="">
                  </div>
                  <div class="col-md-6 mb-6">
                     
                     <label>Email:</label><input class="form-control" type="text"  id="email" name="email" value="">
                     
                  </div>
                  
     </div>
     <div class="row">
<div class="col-md-6 mb-6">
                     
                     <label>Phòng Ban:</label>
                     <select class="form-control" id="select_pb">
                        <?php 
                           foreach ($dspb as $pb) {?>
                              <option value="<?=$pb['MaPhongBan']?>"><?=$pb['TenPhongBan']?></option>

                         <?php  }

                        ?>
                     </select>
                  </div>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn_submit" >Save changes</button>

      </div>
    </div>
  </div>
</div>
<!--Modal 2-->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm Tài Khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div id="alert_message3"></div>
            <form method="POST">
      <div class="row">
                  <div class="col-md-5 mb-5">
                     <label>Tên tài khoản:</label><input class="form-control" type="text" name="TenTaiKhoan2" id="TenTaiKhoan2" value="">
                  </div>
      </div>
      <div class="row">
                  <div class="col-md-6 mb-6">
                     
                     <label>Mật khẩu:</label><input class="form-control" type="text" name="matkhau2" id="matkhau2" value="">
                  </div>
                  <div class="col-md-6 mb-6">
                     
                     <label>Họ tên:</label><input class="form-control" type="text" name="hoten2" id="hoten2" value="">
                  </div>
      </div>
      <div class="row">
                  <div class="col-md-6 mb-6">
                     
                     <label>Số điện thoại:</label><input class="form-control" type="text"  id="sodienthoai2" name="sodienthoai2" value="">
                  </div>
                  <div class="col-md-6 mb-6">
                     
                     <label>Email:</label><input class="form-control" type="text"  id="email2" name="email2" value="">
                     
                  </div>
                  
     </div>
     <div class="row">
<div class="col-md-6 mb-6">
                     
                     <label>Phòng Ban:</label>
                     <select class="form-control" id="select_pb2">
                        <?php 
                           foreach ($dspb as $pb) {?>
                              <option value="<?=$pb['MaPhongBan']?>"><?=$pb['TenPhongBan']?></option>

                         <?php  }

                        ?>
                     </select>
                  </div>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn_submit2" >Save changes</button>

      </div>
    </div>
  </div>
</div>

</form>

<!---->



<!---MODAL3-->

<div class="modal fade" id="MODAL3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Danh Sách Tài Khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div id="alert_message4">
            	


            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn_submit2" >Save changes</button>

      </div>
    </div>
  </div>
</div>

<!---->

<script type="text/javascript">
  function addphongban() {
   $('#ha').toggle();
   }
   function dstk(ds){
$.ajax({
         type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
         url : './content/data/data_tk2.php', //gửi dữ liệu sang trang data.php
         data : {dstk:ds}, //dữ liệu sẽ được gửi
          success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                   { 
                               
                          
                              $('#alert_message4').html(data);
                              //location.reload(true);
                            
                   }
         });
$('#MODAL3').modal();
}




function sua(maTK,TenTaiKhoan,matkhau,hoten,Email,sodienthoai,MaPhongBan){
	$('#MODAL3').modal('hide');
$('#exampleModalLong').modal();
document.getElementById('TenTaiKhoan').innerHTML=TenTaiKhoan;
$('#matkhau').val(matkhau);
$('#hoten').val(hoten);
$('#email').val(Email);
$('#sodienthoai').val(sodienthoai);
$('#select_pb').val(MaPhongBan);


$('#btn_submit').click(function(){
   var mk=$('#matkhau').val();
   var ht=$('#hoten').val();
   var eml=$('#email').val();
   var sdt=$('#sodienthoai').val();
   var pb=$('#select_pb').val();

$.ajax({
         type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
         url : './content/data/data_tk.php', //gửi dữ liệu sang trang data.php
         data : {sua_ID:maTK,sua_mk:mk,sua_hoten:ht,sua_email:eml,sua_sdt:sdt,sua_phongban:pb}, //dữ liệu sẽ được gửi
          success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                   { 
                           
                            //
                            if(data=='Bạn không được bỏ trống!'){
                                 $('#alert_message2').html('<div class="alert alert-danger">'+data+'</div>');
                                 document.documentElement.scrollTop = 0;
                                 //$('#exampleModalLong').modal('hide');
                            }else{
                              $('#alert_message').html('<div class="alert alert-success">Sửa thành công!</div>');
                              $('#exampleModalLong').modal('hide');
                              document.documentElement.scrollTop = 0;
                              //location.reload(true);
                            }
                   }
         });
});
}

//Xoa

function xoa(id){
	$('#MODAL3').modal('hide');
$.ajax({
         type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
         url : './content/data_tk.php', //gửi dữ liệu sang trang data.php
         data : {del_id:id}, //dữ liệu sẽ được gửi
         success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                   { 
                  
                  
                            $('#alert_message').html('<div class="alert alert-success">Xoá thành công!</div>');
                            //location.reload(true);
                   }
         });
         return false;

}
//Them
$('#btn_submit2').click(function(){
   var tenTK=$('#TenTaiKhoan2').val();
   var mk=$('#matkhau2').val();
   var ht=$('#hoten2').val();
   var eml=$('#email2').val();
   var sdt=$('#sodienthoai2').val();
   var pb=$('#select_pb2').val();
$.ajax({
         type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
         url : './content/data/data_tk.php', //gửi dữ liệu sang trang data.php
         data : {add_TK:tenTK,add_mk:mk,add_hoten:ht,add_email:eml,add_sdt:sdt,add_phongban:pb}, //dữ liệu sẽ được gửi
          success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                   { 
                           
                            //
                            if(data=='Bạn không được bỏ trống!' || data=='Tài khoản đã tồn tại!'){
                                 $('#alert_message3').html('<div class="alert alert-danger">'+data+'</div>');
                                 document.documentElement.scrollTop = 0;
                                 //$('#exampleModalLong').modal('hide');
                            }else{
                              $('#alert_message').html('<div class="alert alert-success">Tạo mới thành công</div>');
                              document.documentElement.scrollTop = 0;
                              $('#modal2').modal('hide');                            
                              $('#TenTaiKhoan2').val('');
                              $('#matkhau2').val('');
                              $('#hoten2').val('');
                              $('#email2').val('');
                              $('#sodienthoai2').val('');
                              //location.reload(true);
                            }
                   }
         });
$('#MODAL3').modal('hide');
});




	setInterval(function(){
   $('#alert_message').html('');
   }, 5000);
	
   $('#insert').click(function(){
   var phongban = $('#them').val();
   if(phongban==''){
        $('#alert_message').html('<div class="alert alert-danger">Không được để trống!</div>');
   }else{
   $.ajax({
         type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
         url : './content/data/data_tk2.php', //gửi dữ liệu sang trang data.php
         data : {phongban:phongban}, //dữ liệu sẽ được gửi
         success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                   { 
                     if(data=="Phòng ban đã tồn tại!"){
   
                            $('#alert_message').html('<div class="alert alert-danger">'+data+'</div>');
                            document.documentElement.scrollTop = 0;
                     }else{
                        $('#alert_message').html('<div class="alert alert-success">Thêm thành công!</div>');
                        $('#.loaddata').html(data);
                        document.documentElement.scrollTop = 0;
   //location.reload(true);
                     }
         
                      
                   }
         });

   $('#ha').toggle();
 }
         return false;
   
   
   });
  
   function load(mapb){

    $('#modal2').modal();
    $('#select_pb2').val(mapb);
    $('#MODAL3').modal('hide');
   }
   
   
</script>

<!-- End of Main Content -->
<!-- Footer -->
<!-- End of Footer -->
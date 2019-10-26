<?php
   include_once './controller.php';
   $dspb=getDSPB();
   $dstk=getDSPB2();

   //Add dia diem
   ?>
<div class="container-fluid">
   
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Tài Khoản</h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <div id="alert_message"></div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <button class="btn btn-info btn-cicle" onclick="$('#modal2').modal();" >Thêm tài khoản</i></button>
               <thead>
                  <tr>
                     <th>Tên tài khoản</th>
                     <th>Mật khẩu</th>
                     <th>Họ tên</th>
                     <th>Email</th>
                     <th>Số điện thoại</th>
                     <th>Phòng ban</th>
                     <!-- <th>Thêm</th> -->
                     <th>Sửa</th>
                     <th>Xóa</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>Tên tài khoản</th>
                     <th>Mật khẩu</th>
                     <th>Họ tên</th>
                     <th>Email</th>
                     <th>Số điện thoại</th>
                     <th>Phòng ban</th>
                    <!--  <th>Thêm</th> -->
                     <th>Sửa</th>
                     <th>Xóa</th>                  
                  </tr>
               </tfoot>
               <tbody id="loadData">
    
                  <!-------------------------------<
                     -------------------------------------->
                  <?php
                     foreach($dstk as $value){
                     ?>
                  <tr>
                     <td><?= $value['TenTaiKhoan'];?></td>
                     <td><?=$value['MatKhau']?></td>
                     <td><?=$value['HoTen']?></td>
                     <td><?=$value['Email']?></td>
                     <td><?=$value['SoDienThoai']?></td>
                     <td><?=$value['TenPhongBan']?></td>
                     <!-- <td><</td> -->
                     <td><button onclick="sua(<?=$value['ID']?>,'<?= $value['TenTaiKhoan']?>','<?=$value['MatKhau']?>','<?=$value['HoTen']?>','<?=$value['Email']?>','<?=$value['SoDienThoai']?>','<?=$value['MaPhongBan'];?>')" class="btn btn-warning btn-circle .btn-lg" ><i class="fa fa-magic"></i></button></td>
                     <td><button class="btn btn-danger btn-circle .btn-lg xoa" value="<?= $value['ID']?>"><i class="fas fa-trash"></i></button></td>
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
                     
                     <label>Tên tài khoản:</label><b id="TenTaiKhoan">HAHA</b>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn_submit" >Lưu</button>

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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng </button>
        <button type="button" class="btn btn-primary" id="btn_submit2" >Lưu</button>

      </div>
    </div>
  </div>
</div>

</form>

<!---->
<script type="text/javascript">
  var maTK1=0;
function sua(maTK,TenTaiKhoan,matkhau,hoten,Email,sodienthoai,MaPhongBan){
$('#exampleModalLong').modal();
document.getElementById('TenTaiKhoan').innerHTML=TenTaiKhoan;
$('#matkhau').val(matkhau);
$('#hoten').val(hoten);
$('#email').val(Email);
$('#sodienthoai').val(sodienthoai);
$('#select_pb').val(MaPhongBan);
maTK1=maTK;
};

$('#btn_submit').click(function(){
   var mk=$('#matkhau').val();
   var ht=$('#hoten').val();
   var eml=$('#email').val();
   var sdt=$('#sodienthoai').val();
   var pb=$('#select_pb').val();
$.ajax({
         type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
         url : './content/data/data_tk.php', //gửi dữ liệu sang trang data.php
         data : {sua_ID:maTK1,sua_mk:mk,sua_hoten:ht,sua_email:eml,sua_sdt:sdt,sua_phongban:pb}, //dữ liệu sẽ được gửi
          success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                   { 
                           
                            //
                            if(data=='Bạn không được bỏ trống!'){
                                 $('#alert_message2').html('<div class="alert alert-danger">'+data+'</div>');
                                 //$('#exampleModalLong').modal('hide');
                            }else{
                              $('#alert_message').html('<div class="alert alert-success">Cập nhật thành công!!</div>');
                              $('#exampleModalLong').modal('hide');
                              $('#loadData').html(data);
                            document.documentElement.scrollTop = 0;
                              //location.reload(true);
                            }
                   }
         });
});

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
                                 //$('#exampleModalLong').modal('hide');
                            }else{
                              $('#alert_message').html('<div class="alert alert-success">Tạo mới thành công!!</div>');
                               $('#modal2').modal('hide');
                              $('#loadData').html(data);
                              document.documentElement.scrollTop = 0;
                              $('#TenTaiKhoan2').val('');
                            $('#matkhau2').val('');
                            $('#hoten2').val('');
                            $('#email2').val('');
                            $('#sodienthoai2').val('');
                            $('#select_pb2').val('');
                              //location.reload(true);
                            }
                   }
         });
});






   setInterval(function(){
   $('#alert_message3').html('');
   }, 5000);
   
   $('.xoa').click(function(){
   var id = $(this).attr("value");
   if(id!="")
   {
   $.ajax({
         type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
         url : './content/data/data_tk.php', //gửi dữ liệu sang trang data.php
         data : {del_id:id}, //dữ liệu sẽ được gửi
         success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                   { 
                  
                            $('#alert_message').html('<div class="alert alert-success">Xoá thành công!!!</div>');
                             $('#loadData').html(data);
                             document.documentElement.scrollTop = 0;
                            //location.reload(true);
                   }
         });
         return false;
   }
   });
   setInterval(function(){
   $('#alert_message').html('');
   }, 5000);
   
   
   
   
</script>

<!-- End of Main Content -->
<!-- Footer -->
<!-- End of Footer -->
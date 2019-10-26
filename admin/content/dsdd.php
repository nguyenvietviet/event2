<?php
   include_once './controller.php';
   $dsdd=getDSDD();
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
                     <th>Địa điểm</th>
                     <th>Xóa</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>Địa điểm</th>
                     <th>Xóa</th>
                  </tr>
               </tfoot>
               <tbody>
                  <button class="btn btn-info btn-sm m-1" onclick="add()" style="width:10%"><i class="fa fa-dot-circle-o"></i>Thêm</button>
                  <div id="idd">
                     <div class="row" >
                      <div class="col-md-3" style="margin-bottom: 5px; margin-top: 6px;">
                        <input class="form-control" type="text" id="them">
                      </div>
                     <button class="btn btn-primary btn-sm m-1" type="submit" name="submit" id="insert"><i class="fas fa-plus-circle"> Thêm</i></button>
                    </div>
                  </div>
                  
                  <!-------------------------------<
                     -------------------------------------->
                  <?php
                     $a=0;
                     // date_default_timezone_set('Asia/Ho_Chi_Minh');
                     $b="";
                     foreach($dsdd as $value){
                     ?>
                  <tr>
                     <td><?= $value['DiaDiem'];?></td>
                     <td><button onclick="xoa(<?php echo $maSK;?>)" class="btn btn-danger btn-circle .btn-lg xoa" id=<?= $value['ID']?>><i class="fas fa-trash"></i></button></td>
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
<script type="text/javascript">
   $(document).ready(function(){
   document.getElementById("idd").style.display='none';
   });
   function add() {
   var x = document.getElementById("idd");
   if (x.style.display === "none") {
   x.style.display = "block";
   document.getElementById("them").value='';
   
   } else {
   x.style.display = "none";
   document.getElementById("them").value='';
   
   }
   }
   
   
   $('#insert').click(function(){
   var diadiems = $('#them').val();
   $.ajax({
         type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
         url : './content/data1.php', //gửi dữ liệu sang trang data.php
         data : {diadiem:diadiems}, //dữ liệu sẽ được gửi
         success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                   { 
                     if(data=="Insert Failed!"){
   
                            $('#alert_message').html('<div class="alert alert-danger">'+data+'</div>');
                     }else{
   location.reload(true);
                     }
         //$('#dataTable').dataTable().destroy();
         //$('#dataTable').DataTable();  
   
                       // $('#content1111').html(data);// dữ liệu HTML trả về sẽ được chèn vào trong thẻ có id content
                      
                   }
         });
         return false;
   
   
   });
   setInterval(function(){
   $('#alert_message').html('');
   }, 5000);
   $('.xoa').click(function(){
   var id = $(this).attr("id");
   if(id!="")
   {
   $.ajax({
         type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
         url : './content/data1.php', //gửi dữ liệu sang trang data.php
         data : {id:id}, //dữ liệu sẽ được gửi
         success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                   { 
                            $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                            location.reload(true);
                   }
         });
         return false;
   }
   setInterval(function(){
   $('#alert_message').html('');
   }, 5000);
   });
   
   
   
</script>
<!-- End of Main Content -->
<!-- Footer -->
<!-- End of Footer -->
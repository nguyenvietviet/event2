
<?php
$conn=open();
    if(isset($_GET['edit_id'])){

    $sql = "SELECT * FROM sukien WHERE MaSuKien =" .$_GET['edit_id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    }
    //get noi to chuc
    $dd=array();
    $i=0;
    $sql2 = "SELECT * FROM noitochuc";
     $result2 = mysqli_query($conn, $sql2);
    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
               $dd[$i]=$row2;
         $i++;
           }
           //get ban to chuc
           $btc=array();
    $i=0;
    $sql2 = "SELECT * FROM phongban";
     $result2 = mysqli_query($conn, $sql2);
    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
               $btc[$i]=$row2;
         $i++;
           }
           //get nguoi chi tri
    $nct=array();
    $i=0;
    $sql1 = "SELECT * FROM nguoichutri";
     $result1 = mysqli_query($conn, $sql1);
    while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
               $nct[$i]=$row1;
         $i++;
           }
       close($conn);    
?>
  <script src="http://malsup.github.com/jquery.form.js"></script> 
  <div id="alert_message"></div>
  
<!--Create Edit form -->
<form method="post">
   <div class="container-fluid">
      <div class="card show mb-4">
         <div class="card">
            <div class="card-header">
               <strong class="card-title">Thêm Sự Kiện</strong>
            </div>
            <div class="card-body">
              
               <h4>Thêm</h4>
               <div class="row">
                  <div class="col-md-3 mb-3">
                     <!-- <div class="form-group"> -->
                     <label><b>Ngày tổ chức:</b></label><input class="form-control" type="date" name="ngaytochuc" value="<?=$row['NgayToChuc']?>">
                  </div>
                  <div class="col-md-3 mb-3">
                     <!-- <div class="form-group"> -->
                     <label><b>Thời gian bắt đầu:</b></label><input class="form-control" type="time" name="thoigianbatdau" value="<?=$row['ThoiGianBatDau']?>">
                  </div>
                  <div class="col-md-3 mb-3">
                     <!-- <div class="form-group"> -->
                     <label><b>Thời gian kết thúc:</b></label><input class="form-control" type="time" name="thoigianketthuc" value="<?=$row['ThoiGianKetThuc']?>">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-6">
                     <!-- <div class="form-group"> -->
                      
                     <label><b>Địa điểm: </b></label><br>
                     <div class="hide">
                     <select name="select_dd" class="selectpicker dd form-control" data-live-search="true">
                        <option value="0">--Chọn địa điểm--</option>
                        <?php
                           foreach($dd as $noitochuc){?>
                        <option value="<?=$noitochuc['ID']?>"><?= $noitochuc['DiaDiem'];?></option>
                        <?php  }?>
                     </select> 
                     </div>  
                     <input type="text" name="ddk" class="form-control" id="ipdd" style="width:300px;" placeholder="Chọn địa điểm..." value="<?=$row['DiaDiem']?>">              
                  </div>
                  <div class="col-md-5 mb-6" style="padding-top: 14px;">
                    <br>
                  <input type="checkbox" id="cbDD" checked="">Chọn địa điểm khác
                  </div>
               </div>
               <div class="row">
                <div class="col-md-6 mb-6">
                     <!-- <div class="form-group"> -->
                     <label><b>Người chủ trì:</b></label><br>
                     <div class="hide1">
                     <select name="select_nct" class="selectpicker nct form-control" data-live-search="true">
                        <option value="0">--Chọn người chủ trì--</option>
                        <?php
                           foreach($nct as $ngct){?>
                        <option value="<?=$ngct['ID']?>"><?= $ngct['TenNguoiChuTri'];?></option>
                        <?php  }?>
                     </select>
                   </div>
                     <input type="text" name="nctk" class="form-control" id="ipNCT" style="width:300px" placeholder="Chọn người chủ trì.." value="<?=$row['NguoiChuTri']?>">
                  </div>
                  <div class="col-md-5 mb-6" style="padding-top: 14px;">
                    <br>
                  <input type="checkbox" id="cbNCT" checked>Chọn địa người chủ trì khác
                  </div>

               </div>
               <div class="row">
                 <div class="col-md-6 mb-6">
                     <label><b>Đơn vị tổ chức:</b></label><br>
                     <div class="hide2">
                      <select name="select_btc"  class="selectpicker dvtc form-control" data-live-search="true">
                        <option value="0">--Chọn đơn vị tổ chức--</option>
                        <?php
                           foreach($btc as $dsbtc){?>
                        <option value="<?=$dsbtc['MaPhongBan']?>"><?=$dsbtc['TenPhongBan']?></option>
                        <?php  }?>
                     </select>        
                     </div>            
                  <input type="text" name="dvtck" class="form-control" id="ipdvtck" style="width:300px;" placeholder="Chọn đơn vị tổ ..." value="<?=$row['DonViToChuc']?>">
                  </div>
                  <div class="col-md-5 mb-6" style="padding-top: 14px;">
                    <br>
                  <input type="checkbox" id="cbDVTC" checked>Chọn đơn vị tổ chức khác
                  </div>
               </div>
               <br>
               <div class="row">
                <div class="col-md-5 mb-5">
                  <label><b>Đơn vị tham gia:</b></label>
                  <button type="button" onclick="tp();">Chọn</button>
                  <label><b>Đơn vị tham gia khác:</b></label>
                     <!-- <input class="form-control" type="text" name="thanhphankhac" value="<?=$row['ThanhPhanThamDuKhac']?>"><br> -->
                     <textarea name="thanhphankhac" style="border-radius: 4px; opacity: 80%;" cols="40" rows="3" onchange="DS()"></textarea>
                </div>
                <div class="col-md-7 mb-7">

                  <div id="output_DS"><?=$row['ThanhPhanThamDu']?><b id="tpk"></b></div>
                  <br>
                  
                </div>
              </div>

              <!-- <div class="row">
                  <div class="col-md-5 mb-5">
                     
                     
                     
                  </div>
                  <div class="col-md-5 mb-5">
                  
                  </div>
               </div> -->
               <div class="row">
                  <div class="col-md-12">  
                     <label><b>Nội dung:</b></label>
                     <textarea class="form-control ckeditor  materialize-textarea" name="noidung" rows="5" cols="50"><?=$row['NoiDung']?></textarea>
                  </div>
               </div>
               
               <div class="row" style="margin-top: 10px; margin-left:0px;"> 
                  <button type="button" class="btn btn-primary btn-sm m-1" name="btn-update" id="btn-update"><i class="fa fa-dot-circle-o"></i>Thêm</button>
                  <a href="admin.php"><button type="button" class="btn btn-danger btn-sm m-1" value="button">Cancel</button></a>

               </div>
            </div>
         </div>
      </div>
   </div>
</form>
</div>

<!-- Modal -->
<div class="modal fade" id="modal111" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thành phần tham dự</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div id="alert_message2"></div>
            <div class="row">
            <div class="col-sm-3">
            <div class="hienthi1">
            <input type="checkbox" value="Truong khoa" name="chucdanh">Trưởng khoa<br>  
            <input type="checkbox" value="Thu ki" name="chucdanh">Thư kí<br>  
            <input type="checkbox" value="Pho khoa" name="chucdanh">Phó khoa<br>    <br>
            </div>
            <input type="checkbox" class="btn reply" id="replyb">Chọn đơn vị khác
            <input type="text"  id="reply" name="dvkhac" class="form-control pull-right"  placeholder="Chọn đơn vị khác..." style="display:none;"/>
            </div>
            <div class="col-sm-4">
              <div id="checkboxes">
              <?php foreach($btc as $value){?>
              <input type="checkbox" name="<?=$value['TenPhongBan']?>" value="<?=$value['MaPhongBan']?>"><?=$value['TenPhongBan']?><br>
              <?php }?>
            </div>
            </div>
            <div class="col-sm-1">
              <button onclick="cl();">>></button>

            </div>
            <div class="col-sm-4">
               <div id="checkable-output"></div>
              
            </div>
           </div>
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary"  onclick="luuDS()">Lưu</button>

      </div>
    </div>
  </div>
</div>
</div>   
<script type="text/javascript">
 var ar=[];
var tparr1=[];
var co=0;
var id='ID_';
  function tp(){
  $('#checkable-output').html($('#output_DS').html());
    $('#modal111').modal();

  }
  function cl(){
    
    var tparr2=[];
    var dstp=[];
    var chucvi=[];
    $.each($("#checkboxes input:checked"), function(){
        dstp.push($(this).attr('name'));
        tparr2.push($(this).val());
    });
        ar.push(tparr2);
        tparr1.push(tparr2);
        var x=String(tparr1) ;
        tparr1=x.split(",");
            //alert("My favourite sports are: " + dstp.join(", "));
            if ($('#replyb').is(':checked')) {
              chucvi.push($('#reply').val());
            }else{
                 $.each($("input[name='chucdanh']:checked"), function(){
                 chucvi.push($(this).val());
            });
            }
           // alert("My favourite sports are: " + dstp.join(", "));
           
           
           
if(dstp.length>0){
 
  if(chucvi.length>0){
    
    $('#checkable-output').prepend('<p class='+id+co+'><b>'+chucvi.join(", ")+'</b> : '+ dstp.join(", ")+'<button onclick="del(\''+id+co+'\',\''+tparr2+'\',\''+tparr1+'\')">Xóa</button><br></p>');
  
    
  }else{
    $('#checkable-output').prepend('<p class='+id+co+'>'+ dstp.join(", ")+'<button onclick="del(\''+id+co+'\',\''+tparr2+'\',\''+tparr1+'\')">Xóa</button><br></p>');
    

  }
  co++;
}
    if ($('#replyb').is(':checked')) {
      $('.hienthi1').toggle();
      $('#reply').toggle();
    }
    $('.modal-body input:checkbox').removeAttr('checked');
    
    
  }

  $('#replyb').click(function(){
    $('.hienthi1').toggle();
    $('#reply').toggle();
    $('#reply').val('');
  })
  $('#cbDD').click(function(){
    $('.hide').toggle();
    $('#ipdd').toggle();

  })
  $('#cbNCT').click(function(){
    $('.hide1').toggle();
    $('#ipNCT').toggle();

  })
  $('#cbDVTC').click(function(){
    $('.hide2').toggle();
    $('#ipdvtck').toggle();

  })
  function luuDS(){

$('#output_DS').html($('#checkable-output').html());
  }
  function del(id,arr,arr2){
      mangcon=arr.split(",");
     // mangdau=arr2.split(",");
      $('.'+id).remove();
      ar.length=ar.length-1;
       tparr1 = tparr1.filter(function(x) { 
       return mangcon.indexOf(x) < 0;
});
       
       

  }
  $('#btn-update').click(function(){
    var  ngaytochuc=$("input[name=ngaytochuc]").val();
    var tgbatdau=$("input[name=thoigianbatdau]").val();
    var tgketthuc=$("input[name=thoigianketthuc]").val();
    if ($('#cbDD').is(':checked')) {
      var diadiem=$("#ipdd").val();

    }else{
      var diadiem=$(".dd option:selected" ).text();

    }

    if ($('#cbNCT').is(':checked')) {
      var nct=$("#ipNCT").val();

    }else{
      var nct=$(".nct option:selected" ).text();
    }

    if ($('#cbDVTC').is(':checked')) {
      var dvtc=$("#ipdvtck").val();

    }else{
      var dvtc=$(".dvtc option:selected" ).text();
    }
    var tptg=[...new Set(tparr1)];
    var tptgk=$('textarea[name=thanhphankhac]').val();
    var noidung=CKEDITOR.instances['noidung'].getData();
    var thanhphan=$('#output_DS').html();
    var tptg2=$('#output_DS').text();
    
    if(ngaytochuc==''|| tgbatdau==''||tgketthuc==''||diadiem==''||diadiem=='--Chọn địa điểm--'||nct==''||nct=='--Chọn người chủ trì--'||dvtc==''||dvtc=='--Chọn đơn vị tổ chức--'||noidung==''||tptg2==''){
      
        $('#alert_message').html('<div class="alert alert-danger">Không được để trống</div>');
         document.documentElement.scrollTop = 0;
    }else{
        $.ajax({
         type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
         url : './content/data/EditEvent_Data.php', //gửi dữ liệu sang trang data.php
         data : {id:<?=$row['MaSuKien']?>,ngaytochuc:ngaytochuc,tgbatdau:tgbatdau,tgketthuc:tgketthuc,diadiem:diadiem,nct:nct,dvtc:dvtc,noidung:noidung,thanhphan:thanhphan,tptg:tptg}, //dữ liệu sẽ được gửi
         success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                   { 
                        if(data!='Cập nhật thành công!!'){
                              $('#alert_message').html('<div class="alert alert-danger">'+data+'</div>');
                        }else{
                              $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                        }
                             
                               document.documentElement.scrollTop = 0;
                            // location.reload(true);
                   }
         });
    }
    

    
    
         
    });
function DS(){
  document.getElementById("tpk").innerHTML = $('textarea[name=thanhphankhac]').val()
}
$(document).ready(function(){
  $('textarea[name=thanhphankhac]').val($('#tpk').text());
  $(".hide").css("display", "none");
  $(".hide1").css("display", "none");
  $(".hide2").css("display", "none");

})
</script>

<!-- Alert for Updating -->


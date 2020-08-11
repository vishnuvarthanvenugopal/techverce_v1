<?php include "header.php";

if(isset($_POST['statusupdate'])){
  $sql = "update payment_history set payment_status = 'SUCCESS', txn_ref_no = '".$_POST['tref']."', bnk_ref_no = '".$_POST['bref']."' where id = ".$_POST['payment_id'];
  mysqli_query($connection,$sql);

  
}

$id=$_GET['year'];



/*$re="SELECT *,MONTH(cast(p.updated_date as date)) as Month,SUM(p.totalFees)+SUM(p.serviceCharge) as fees_collection FROM payment_history as p left join student as s on p.student_id = s.studentId where YEAR(cast( p.updated_date as date))='".$id."' GROUP BY MONTH(cast(p.updated_date as date)) ORDER BY id DESC";
echo $re;exit;*/

  $result = mysqli_query($connection,"SELECT *,MONTHNAME(cast(p.updated_date as date)) as Month,SUM(p.totalFees)+SUM(p.serviceCharge) as fees_collection FROM payment_history as p left join student as s on p.student_id = s.studentId where YEAR(cast( p.updated_date as date))='".$id."' GROUP BY MONTH(cast(p.updated_date as date)) ORDER BY id DESC") or die(mysqli_error());





include "left-menu.php";
?>
<div class="page-wrapper">
  <!-- Bread crumb -->
  <div class="page-titles row">
    <div class="col-md-5 align-self-center">
      <h3 class="text-primary">Payment History</h3> </div>
      <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
          <li class="breadcrumb-item active">Students</li>
        </ol>
      </div>
  </div>
    
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
      <!-- Start Page Content -->
      <div class="row">
        <div class="col-12">
          <div class="card">
           
            <div class="card-body">
              <h2 style="text-align: center;">Payment History of year <?php echo $_GET['year'];?> </h2>          
              <div class="table-responsive ">
                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>S.no</th>
                      <th>Month</th> 
                      <th>Collected Fees</th> 
                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                  /*  $result = mysqli_query($connection,"SELECT * FROM payment_history as p left join student as s on p.student_id = s.studentId ORDER BY id DESC") or die(mysqli_error());*/
                    $i = 1;
                    if(isset($result)){
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                      $amount = $row['fees_collection'];
                              setlocale(LC_MONETARY, 'en_IN');
                              $tot_amount = number_format( $amount);
                      echo "<tr>";
                      echo '<td>' . $i++ . '</td>';
                      echo '<td>' . $row['Month'] . '</td>';
                      echo '<td>' . $tot_amount. '</td>';
                    
                      echo "</tr>";
                    }}
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End PAge Content -->
    </div>

    <div class="modal" id="viewHistoryModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            Modal body..
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    <!-- End Container fluid  -->
    <!-- footer -->
    <?php include "footer.php"; ?>
    <script type="text/javascript">
      $(document).ready( function () {
    $('#example23').DataTable();
    $('body').on('click', '.print_challan', function(e){
        e.preventDefault();
        window.open($(this).attr("href"), "", "width=800,height=600");
    });
    $('body').on('click', '.view_challan', function(e){
        $('#viewHistoryModal').modal('show');
        var rr = JSON.parse(atob($(this).data('id')));

        $('#viewHistoryModal .modal-title').text('Invoice #'+(rr.id));

        var html = '<div class="table-responsive "> '+
               '<table  class="display nowrap table table-hover table-striped table-bordered" >'+
                '<tbody>'+
                  '<tr>'+
                    '<th>Student Name</th>'+
                    '<th style="text-align: left;">'+rr.firstName+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Regiter No</th>'+
                    '<th style="text-align: left;">'+rr.registerNumber+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Mobile</th>'+
                    '<th style="text-align: left;">'+rr.mobile+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Payment Date</th>'+
                    '<th style="text-align: left;">'+rr.updated_date+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Payment Mode</th>'+
                    '<th style="text-align: left;">'+rr.payment_mode+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Payment Status</th>'+
                    '<th style="text-align: left;">'+rr.payment_status+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Payment Mode</th>'+
                    '<th style="text-align: left;">'+rr.payment_mode+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Tution-fee</th>'+
                    '<th style="text-align: left;">'+rr.tutition_fee+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Pre Tution-fee</th>'+
                    '<th style="text-align: left;">'+rr.pre_tutition_fee+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Hostel Day fee</th>'+
                    '<th style="text-align: left;">'+rr.hos_dys_fee+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Pre Hostel Day fee</th>'+
                    '<th style="text-align: left;">'+rr.pre_hos_dys_fee+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Service fee</th>'+
                    '<th style="text-align: left;">'+rr.serviceCharge+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Total Amount</th>'+
                    '<th style="text-align: left;">'+rr.totalFees+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Trax-ref-No</th>'+
                    '<th style="text-align: left;">'+rr.txn_ref_no+'</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Bank-Ref-No</th>'+
                    '<th style="text-align: left;">'+rr.bnk_ref_no+'</th>'+
                  '</tr>'+
                  '</tbody>'+
                  '</table>';

                if(rr.payment_status != 'SUCCESS'){
                  html += '<br>'+
                  '<form method="post"><h4>Verify and Manual Update</h4><div class="table-responsive "> '+
               '<table  class="display nowrap table table-hover table-striped table-bordered" >'+
                '<tbody>'+
                  '<tr>'+
                    '<th>Payment Status</th>'+
                    '<th style="text-align: left;">SUCCESS</th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Trax-ref-No</th>'+
                    '<th style="text-align: left;"><input type="text" name="tref" ></th>'+
                  '</tr>'+
                  '<tr>'+
                    '<th>Bank-Ref-No</th>'+
                    '<th style="text-align: left;"><input type="text" name="bref" ></th>'+
                  '</tr>'+
                  '</tbody>'+
                  '</table><input type="hidden" name="payment_id" value="'+rr.id+'"><input type="submit" name="statusupdate" class="btn btn-primary" value="Submit"></form>';
                }
                  

        $('#viewHistoryModal .modal-body').html(html);
    });
} );


$(function() {
      $('input[name="from_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,      
    });
       $('input[name="to_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
      
    });
  });
    </script>
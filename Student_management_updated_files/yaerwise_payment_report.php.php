<?php include "header.php";

if(isset($_POST['statusupdate'])){
  $sql = "update payment_history set payment_status = 'SUCCESS', txn_ref_no = '".$_POST['tref']."', bnk_ref_no = '".$_POST['bref']."' where id = ".$_POST['payment_id'];
  mysqli_query($connection,$sql);

  
}

$id=$_GET['year'];

echo =$id ;exit;
if(isset($_POST['department']) || isset($_POST['yearOfStudying']) || isset($_POST['from_date']) || isset($_POST['to_date'])) 
{
   $from_date=date("Y-m-d",strtotime($_POST['from_date']));
   $to_date=date("Y-m-d",strtotime($_POST['to_date']));

  //$re="";

    /// print_r($re);exit;

  $result = mysqli_query($connection,"SELECT * FROM payment_history as p left join student as s on p.student_id = s.studentId

    where s.department='".$_POST['department']."' OR s.yearOfStudying='".$_POST['yearOfStudying']."'AND p.YEAR(cast(updated_date as date))='".$id."' ORDER BY id DESC") or die(mysqli_error());
}
else
{
  /*$result = mysqli_query($connection,"SELECT * FROM payment_history as p left join student as s on p.student_id = s.studentId where  p.YEAR(cast(updated_date as date))=".$id."ORDER BY id DESC") or die(mysqli_error());*/
}


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
            <div class="col-lg-12">
                <form class="form-valide"  method="POST"  id="student_form" >
                          <div class="row">
                                 <div class="col-md-3">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="department">Department <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="department" name="department" required="true">
                                                        <option value="" >Choose Department</option>
                                                        <option value="B.Tech -Artificial Intelligence and Data Science">B.Tech -Artificial Intelligence and Data Science</option>
                                                        <option value="B.Tech - BioTechnology">B.Tech - BioTechnology</option>
                                                        <option value="B.Tech - Information Technology">B.Tech - Information Technology</option>
                                                        <option value="B.E - Computer Science and Engineering">B.E - Computer Science and Engineering</option>
                                                        <option value="B.E - Electronics and Communication Engineering">B.E - Electronics and Communication Engineering</option>
                                                        <option value="B.E - Electrical and Electronics Engineering">B.E - Electrical and Electronics Engineering</option>
                                                        <option value="B.E - Mechanical Engineering">B.E - Mechanical Engineering</option>
                                                        <option value="B.E - Civil Engineering">B.E - Civil Engineering</option>
                                                        <option value="B.Arch - Bachelor of Architecture">B.Arch - Bachelor of Architecture</option>
                                                        <option value="M.E - Computer Science">M.E - Computer Science</option>
                                                        <option value="M.E - VLSI Design">M.E - VLSI Design</option>
                                                        <option value="M.E - Embedded System Technologies">M.E - Embedded System Technologies</option>
                                                        <option value="MBA - Master of Business Administration">MBA - Master of Business Administration</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="val-email">Year of studying<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="yearOfStudying" name="yearOfStudying" required="true">
                                                        <option value="">Select</option>
                                                        <option value="I">First year</option>
                                                        <option value="II">Second year</option> 
                                                        <option value="III">Third year</option> 
                                                        <option value="IV">Fourth year</option>                
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-2">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label"  for="dateOfBirth">From Date <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="from_date" autocomplete="off" name="from_date" value="" placeholder="From Date" >
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-2">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label"  for="dateOfBirth">To Date <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="to_date" autocomplete="off" name="to_date" value="" placeholder="To Date" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label"  for="dateOfBirth">.</label>
                                                <div class="col-md-9">
                                                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Search</button>
                                                </div>
                                            </div>
                                        </div>

                                        
                                      </div>
                </form>

            </div>
            <div class="card-body">
              <h2 style="text-align: center;">Payment History</h2>          
              <div class="table-responsive ">
                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>S.no</th>
                      <th>Student Name</th> 
                      <th>Reg No</th> 
                      <th>Trax-ref-No</th>                     
                      <!--<th>Bank-Ref-No</th>-->
                      <th>Payment Date</th>
                      <!--<th>Error status</th>-->   
                      <!--<th>Error description</th>-->
                     <!--   <th>response-msg</th> -->
                      <th>Payment mode</th>
                      <th>Tution-fee</th>
                      <th>Hos/Days-Fee</th>
                      <th>Payment Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                  /*  $result = mysqli_query($connection,"SELECT * FROM payment_history as p left join student as s on p.student_id = s.studentId ORDER BY id DESC") or die(mysqli_error());*/
                    $i = 1;
                    if(isset($result)){
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                      echo "<tr>";
                      echo '<td>' . $i++ . '</td>';
                      echo '<td>' . $row['firstName'] . '</td>';
                      echo '<td>' . $row['registerNumber'] . '</td>';
                      echo '<td>' . $row['txn_ref_no'] . '</td>';
                      //echo '<td>' . $row['bnk_ref_no'] . '</td>';
                      echo '<td>' . $row['updated_date'] . '</td>';
                      //echo '<td>' . $row['error_status'] . '</td>';
                      //echo '<td>' . $row['error_description'] . '</td>';
                      // echo '<td>' . $row['response_msg'] . '</td>';
                      echo '<td>' . $row['payment_mode'] . '</td>';
                      echo '<td>' . $row['tutition_fee'] . '</td>';
                      echo '<td>' . $row['hos_dys_fee'] . '</td>';
                       echo '<td>' . $row['payment_status'] . '</td>';              
                      echo '                        <td class="text-left">
                      <a class="view_challan" data-id="'.base64_encode(json_encode($row)).'">
                      <i class="fa fa-eye" title="View" style="color:#1c8fb7; font-size:17px;"></i></a>
                      &nbsp;&nbsp;';
                      if($row['payment_status'] == 'SUCCESS'){
                      echo '<a class="print_challan" target="_blank" href="print-challan.php?id='.$row['id'].' ">
                      <i class="fa fa-print" title="Print" style="color:#1c8fb7; font-size:17px;"></i></a>
                      &nbsp;&nbsp;';
                      }
                      echo '</td>'; 
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
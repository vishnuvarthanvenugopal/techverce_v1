
<?php 
include 'header.php';
include 'left-menu.php';
$id = $_SESSION['userType']['id'];
$query = "SELECT * FROM student where studentId='$id'";
$result = mysqli_query($connection,$query) or die(mysqli_error());
$row = mysqli_fetch_assoc($result);
$id = $_SESSION['userType']['id'];
$studentFetch = "SELECT * FROM studentfees where studentId='$id'";
$result = mysqli_query($connection,$studentFetch) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result); 

$id = $_SESSION['userType']['id'];
$payment_result = "SELECT * FROM payment_history where student_id='$id'";
$pay_result = mysqli_query($connection,$payment_result) or die(mysqli_error());
$pay_row = mysqli_fetch_assoc($pay_result); 

$paidhostelFees = 0;
$paidtutionFees = 0;
while($r = mysqli_fetch_assoc($pay_result)){
    //print_r($r);
    if($r['payment_status'] == 'SUCCESS'){
        $paidhostelFees += ($r['hos_dys_fee'] + $r['pre_hos_dys_fee']);
        $paidtutionFees += ($r['tutition_fee'] + $r['pre_tutition_fee']);
    }
}

?>
<div class="page-wrapper">
  <!-- Bread crumb -->
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-primary">Student Details</h3> </div>
      <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a >Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
     </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
      <!-- Start Page Content -->
      <h2 style="text-align: center;"> Student</h2>
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="form-validation">
           
<!-- Table view student details -->
<div class="row">
<div class="col-lg-3">
</div>
 <div class="col-lg-5">
 <div class="table-responsive "> 
               <table  class="display nowrap table table-hover table-striped table-bordered" >
                <thead>
                  <tr>
                    <th>Description</th>
                    <th style="text-align: left;">Status</th>
                  </tr>
                  <tr>
                    <td>Name</td>
                    <td><?php echo $row['firstName']; ?></td>
                  </tr>
                  <tr>
                    <td>Register Number</td>
                    <td> <?php echo ($row['registerNumber']) ? $row['registerNumber'] : $row['applicationNumber']; ?></td>
                  </tr>
                  <tr>
                    <td>Date Of Birth</td>
                    <td><?php echo $row['dateOfBirth']; ?></td>
                  </tr>
                  <tr>
                    <td>Student Type</td>
                    <td> <?php echo $row['studentType']; ?></td>
                  </tr>
                  <tr>
                    <td>Department</td>
                    <td><?php echo $row['department']; ?></td>
                  </tr>
                  <tr>
                    <td>Year Of Joining</td>
                    <td><?php echo $row['yearOfJoining']; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                     <td> <?php echo $row['emailId']; ?></td>
                  </tr>
                 <!--   <tr>
                    <td>Genter</td>
                     <td></td>
                  </tr> -->
                   <tr>
                    <td>Quata</td>
                     <td><?php echo $row['quota']; ?></td>
                  </tr>
                   <tr>
                    <td>Mobile</td>
                     <td><?php echo $row['mobile']; ?></td>
                  </tr>
                   <tr>
                    <td>Hostel Amount/Transport</td>
                     <td><?php echo $row1['hostelFees']; ?></td>
                  </tr>
                   <tr>
                    <td>Tution Amount</td>
                     <td><?php echo $row1['tutionFees']; ?></td>
                  </tr>
                   <tr>
                    <td>Paid Hostel Amount/Transport</td>
                     <td><?php echo $paidhostelFees; ?></td>
                  </tr>
                   <tr>
                    <td>Paid Tution Amount</td>
                     <td><?php echo $paidtutionFees; ?></td>
                  </tr>
                  <tr>
                    <td>Bal. Hostel Amount/Transport</td>
                     <td><?php echo $row1['hostelFees'] - $paidhostelFees; ?></td>
                  </tr>
                   <tr>
                    <td>Bal. Tution Amount</td>
                     <td><?php echo $row1['tutionFees'] - $paidtutionFees; ?></td>
                  </tr>
                </thead>
            </table>
          </div>
        </div>
        <div class="col-lg-3">
      </div>
  </div>
               </div><br>
                 <div class="col-md-12"> 
                  <a href="dashboard.php">
                   <p style="text-align: center;"> <button type="button" name="submit" id="submit" class="btn btn-primary">
                      Back</button></p></a>
                  </div>
                  </form>
                    <div class="table-responsive m-t-40">
              <h2> Amount Details</h2> 
               <table  class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th>S.No</th>
                    <th>studentId</th>
                    <th>tutionFees</th>
                    <th>hostelFees/transport</th>
                    <th>previoustutionfeeDue</th>
                    <th>previousHostelfeeDue</th>
                    <th>firstGrConcession</th>
                    <th>scTutionFeeConcession</th>
                    <th>totalFees</th>
                    <th>totalFeesDue</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 $result = mysqli_query($connection,"SELECT * FROM studentfees where studentId='$id'") or die(mysqli_error());
                 $i = 1;
                 while($row1 = mysqli_fetch_array( $result )) 
                 {
                  echo "<tr>";
                    echo '<td>' . $i++ . '</td>';
                  echo '<td>' . ($row['registerNumber'] ? $row['registerNumber'] : $row['applicationNumber']) . '</td>';
                  echo '<td>' . $row1['tutionFees'] . '</td>';
                  echo '<td>' . $row1['hostelFees'] . '</td>';
                  echo '<td>' . $row1['previoustutionDue'] . '</td>';  
                  echo '<td>' . $row1['previoushostelDue'] . '</td>';  
                  echo '<td>' . $row1['firstGrConcession'] . '</td>';  
                  echo '<td>' . $row1['scTutionFeeConcession'] . '</td>';  
                  echo '<td>' . $row1['totalFees'] . '</td>';        
                  echo '<td>' . $row1['totalFeesDue'] . '</td>';  
                }
                ?>
              </tbody>
            </table>
          </div>
 <!-- Total Transaction  perticular student-->
          <div class="table-responsive m-t-40">
              <h2>Paid Transaction Details</h2> 
               <table  class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                     <th>S.No</th>
                    <th>Student Name</th> 
                      <th>Mobile</th>
                    <th>PaidTutionFees</th>
                    <th>PaidHostelFees/Transport</th>
                    <th>PaymentDate</th>
                     <th>PaymentMode</th>
                    <th>Bank_Ref_Num</th>
                    <th>Transaction_ref_no</th>
                   <th>paymentStatus</th> 
                   <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 $payment_result = mysqli_query($connection,"SELECT * FROM payment_history where student_id=$id") or die(mysqli_error());
                 $i = 1;
                 while($pay_row = mysqli_fetch_array($payment_result)) 
                 {
                  echo "<tr>";
                    echo '<td>' . $i++ . '</td>';
                    echo '<td>' . $pay_row['firstName'] . '</td>';
                      echo '<td>' . $pay_row['mobile'] . '</td>';
                  echo '<td>' . $pay_row['tutition_fee'] . '</td>';
                  echo '<td>' . $pay_row['hos_dys_fee'] . '</td>';
                  echo '<td>' . $pay_row['pay_date'] . '</td>';  
                    echo '<td>' . $pay_row['payment_mode'] . '</td>';       
                  echo '<td>' . $pay_row['bnk_ref_no'] . '</td>'; 
                   echo '<td>' . $pay_row['txn_ref_no'] . '</td>'; 
                   echo '<td>' . $pay_row['payment_status'] . '</td>';  
                   echo '<td class="text-left">';
                      
                      if($pay_row['payment_status'] == 'SUCCESS'){
                      echo '<a class="print_challan" href="print-challan.php?id='.$pay_row['id'].' ">
                      <i class="fa fa-print" title="Print" style="color:#1c8fb7; font-size:17px;"></i></a>
                      &nbsp;&nbsp;';
                      }
                      echo '</td>'; 
                }
                ?>
              </tbody>
            </table>
          </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'footer.php';?>
    <script>
       $(document).ready(function(){
          $('.print_challan').click(function(e){
            e.preventDefault();
            window.open($(this).attr("href"), "", "width=800,height=600");
        }); 
       });
    </script>

<?php 
include 'header.php';
include 'left-menu.php';
$id = $_GET['id'];
$query = "SELECT * FROM student where studentId='$id'";
$result = mysqli_query($connection,$query) or die(mysqli_error());
$row = mysqli_fetch_assoc($result);
$id = $_GET['id'];
$studentFetch = "SELECT * FROM studentfees where studentId='$id'";
$result = mysqli_query($connection,$studentFetch) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result); 

$id = $_GET['id'];
$payment_result = "SELECT * FROM exam_fees where id='$id'";
$pay_results = mysqli_query($connection,$payment_result) or die(mysqli_error());
$pay_result = mysqli_fetch_assoc($pay_results); 

?>
<div class="page-wrapper">
  <!-- Bread crumb -->
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-primary">Exam Fees Details</h3> </div>
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
               <table id="" class="display nowrap table table-hover table-striped table-bordered" >
                <thead> <tr>
                    <th>Description</th>
                    <th style="text-align: left;">Status</th>
                  </tr></thead>
                <tbody>
                 
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
                    <td>Semester</td>
                     <td><?php echo $pay_result['semester']; ?></td>
                  </tr>
                  <tr>
                    <td>Theory Fee</td>
                     <td><?php echo $pay_result['theory_fee']; ?></td>
                  </tr>
                  <tr>
                    <td>Practical Fee</td>
                     <td><?php echo $pay_result['practical_fee']; ?></td>
                  </tr>
                  <tr>
                    <td>Photo copy Fee</td>
                     <td><?php echo $pay_result['photo_copy_fee']; ?></td>
                  </tr>
                   <tr>
                    <td>Revaluation Fee</td>
                     <td><?php echo $pay_result['revaluation _fee']; ?></td>
                  </tr>
                   <tr>
                    <td>Provisional Fee</td>
                     <td><?php echo $pay_result['provisional_certificate_fee']; ?></td>
                  </tr>
                  <tr>
                    <td>Certificate Fee</td>
                     <td><?php echo $pay_result['degree_certificate_fee']; ?></td>
                  </tr>
                   <tr>
                    <td>Consolidated Fee</td>
                     <td><?php echo $pay_result['consolidated_mark_sheet']; ?></td>
                  </tr>
                   <tr>
                    <td>AU Fee</td>
                     <td><?php echo $pay_result['AU_registration_fee']; ?></td>
                  </tr>
                   <tr>
                    <td>AU Sports Fee</td>
                     <td><?php echo $pay_result['AU_sports_fee']; ?></td>
                  </tr>
                   <tr>
                    <td>AU Library Fee</td>
                     <td><?php echo $pay_result['AU_library_fee']; ?></td>
                  </tr>
                  <tr>
                    <td>AU Recogn Fee</td>
                     <td><?php echo $pay_result['AU_recogn_fee']; ?></td>
                  </tr>
                  <tr>
                    <td>Fine</td>
                     <td><?php echo $pay_result['fine']; ?></td>
                  </tr>
                   <tr>
                    <td>University Fees</td>
                     <td><?php echo $pay_result['university_fees']; ?></td>
                  </tr>

                   <tr>
                    <td>Total Fees</td>
                     <td><?php echo $pay_result['total']; ?></td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
        <div class="col-lg-3">
      </div>
  </div>
               </div><br>

                  </form>
                   <div class="container-fluid">
                     <div class="col-sm-12 text-center">
                        
                          <a href="" class="btn btn-primary" title="Cancel" id="btn-cancel"> Print </a>
                         <a href="examfees.php" class="btn btn-warning" title="Cancel" id="btn-cancel"> Cancel </a>
                     </div>
                 </div>   
               <!--     <div class="table-responsive m-t-40">
              <h2> Amount Details</h2> 
               <table  class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th>S.No</th>
                    <th>Reg No</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <th>Subjects</th>
                     <th>Theory Fee</th>
                     <th>Practical Fees</th>
                    <th>Fine</th>
                    <th>Revalution</th>
                    <th>Other Fees</th>
                    <th>totalFees</th>                    
                  </tr>
                </thead>
                <tbody>
                 <?php
                 $result = mysqli_query($connection,"SELECT * FROM exam_fees where studentId='$id'") or die(mysqli_error());
                 $i = 1;
                 while($row1 = mysqli_fetch_array( $result )) 
                 {
                  $other_fees=(int)$row1['photo_copy_fee']+(int)$row1['provisional_certificate_fee']+(int)$row1['degree_certificate_fee']+(int)$row1['consolidated_mark_sheet']+(int)$row1['AU_registration_fee']+(int)$row1['AU_recogn_fee']+(int)$row1['AU_sports_fee']+(int)$row1['AU_library_fee']+(int)$row1['university_fees'];
                  echo "<tr>";
                    echo '<td>' . $i++ . '</td>';
                  echo '<td>' . ($row['registerNumber'] ? $row['registerNumber'] : $row['applicationNumber']) . '</td>';
                  echo '<td>' . $row1['firstName'] . '</td>';
                  echo '<td>' . $row1['department'] . '</td>';
                  echo '<td>' . $row1['semester'] . '</td>';  
                  echo '<td>' . $row1['theory_fee'] . '</td>'; 
                    echo '<td>' . $row1['practical_fee'] . '</td>'; 
                  echo '<td>' . $row1['fine'] . '</td>';  
                  echo '<td>' . $row1['revaluation _fee'] . '</td>';  
                  echo '<td>' . $other_fees . '</td>';        
                  echo '<td>' . $row1['total'] . '</td>';  
                }
                ?>
              </tbody>
            </table>
          </div>-->
 <!-- Total Transaction  perticular student-->
         <!-- <div class="table-responsive m-t-40">
              <h2>Paid Transaction Details</h2> 
               <table  class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                     <th>S.No</th>
                    <th>Reg No</th>
                    <th>Student Name</th>
                    <th>Mobile</th>
                    <th>PaidTutionFees</th>
                    <th>PaidHostelFees/Transport</th>
                    <th>PaymentDate</th>
                     <th>PaymentMode</th>
                    <th>Bank_Ref_Num</th>
                    <th>Transaction_ref_no</th>
                   <th>paymentStatus</th> 
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
                  echo '<td>' . ($row['registerNumber'] ? $row['registerNumber'] : $row['applicationNumber']) . '</td>';
                   echo '<td>' . $pay_row['firstName'] . '</td>';
                      echo '<td>' . $pay_row['mobile'] . '</td>';
                  echo '<td>' . $pay_row['tutition_fee'] . '</td>';
                  echo '<td>' . $pay_row['hos_dys_fee'] . '</td>';
                  echo '<td>' . $pay_row['pay_date'] . '</td>';  
                    echo '<td>' . $pay_row['payment_mode'] . '</td>';       
                  echo '<td>' . $pay_row['bnk_ref_no'] . '</td>'; 
                   echo '<td>' . $pay_row['txn_ref_no'] . '</td>';
                   
                   echo '<td>' . $pay_row['payment_status'] . '</td>';                         
                }
                ?>
              </tbody>
            </table>
          </div>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'footer.php';?>

    <script type="text/javascript">
      $(document).ready( function () {
    $('#example23').DataTable();

} );
    </script>
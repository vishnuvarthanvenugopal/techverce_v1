
<?php 
include 'header.php';
include 'left-menu.php';
$id = $_GET['id'];

print_r($id);

$query = "SELECT * FROM student where studentId='$id'";
$result = mysqli_query($connection,$query) or die(mysqli_error());
$row = mysqli_fetch_assoc($result);
$id = $_GET['id'];
$studentFetch = "SELECT * FROM studentfees where studentId='$id'";
$result = mysqli_query($connection,$studentFetch) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result); 
/*
$id = $_GET['id'];
$payment_result = "SELECT * FROM payment_history where student_id='$id'";
$pay_result = mysqli_query($connection,$payment_result) or die(mysqli_error());
$pay_row = mysqli_fetch_assoc($pay_result); */
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
                    <td>Hostel Amount</td>
                     <td><?php echo $row1['hostelFees']; ?></td>
                  </tr>
                   <tr>
                    <td>Tution Amount</td>
                     <td><?php echo $row1['tutionFees']; ?></td>
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
                  <a href="student-history.php">
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
                    <th>hostelFees</th>
                    <th>previousDue</th>
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
                 while($row = mysqli_fetch_array( $result )) 
                 {
                  echo "<tr>";
                    echo '<td>' . $i++ . '</td>';
                  echo '<td>' . $row['studentId'] . '</td>';
                  echo '<td>' . $row['tutionFees'] . '</td>';
                  echo '<td>' . $row['hostelFees'] . '</td>';
                  echo '<td>' . $row['previousDue'] . '</td>';   
                  echo '<td>' . $row['firstGrConcession'] . '</td>';  
                  echo '<td>' . $row['scTutionFeeConcession'] . '</td>';  
                  echo '<td>' . $row['totalFees'] . '</td>';        
                  echo '<td>' . $row['totalFeesDue'] . '</td>';  
                }
                ?>
              </tbody>
            </table>
          </div>
 <!-- Total Transaction  perticular student-->
         <!--  <div class="table-responsive m-t-40">
              <h2>Paid Transaction Details</h2> 
               <table  class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                     <th>S.No</th>
                    <th>StudentId</th>
                    <th>PaidTutionFees</th>
                    <th>PaidHostelFees</th>
                    <th>PaymentDate</th>
                     <th>PaymentMode</th>
                    <th>Bank_Ref_Num</th>
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
                  echo '<td>' . $_POST['student_id'] . '</td>';
                  echo '<td>' .  $_POST['tutition_fee'] . '</td>';
                  echo '<td>' .  $_POST['hos_dys_fee'] . '</td>';
                  echo '<td>' .  $_POST['pay_date'] . '</td>';  
                    echo '<td>' .  $_POST['payment_mode'] . '</td>';       
                  echo '<td>' .  $_POST['bnk_ref_no'] . '</td>';  
                   echo '<td>' .  $_POST['payment_status'] . '</td>';                         
                }
                ?>
              </tbody>
            </table>
          </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'footer.php';?>
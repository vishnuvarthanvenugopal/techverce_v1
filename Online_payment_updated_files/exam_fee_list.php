
<?php include "header.php";

$id = $_SESSION['userType']['id'];


    $result = mysqli_query($connection,"SELECT * FROM exam_fees where studentId=$id ORDER BY studentId DESC") or die(mysqli_error());



include "left-menu.php";
?>
<div class="page-wrapper">
  <!-- Bread crumb -->
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-primary">List of Payments</h3> </div>
      <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
          <li class="breadcrumb-item active">Exam fees history</li>
        </ol>
      </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
      <!-- Start Page Content -->
      
      <?php if(isset($_SESSION['msg'])){?>
      <div class="alert alert-<?= $_SESSION['msgclass']?>">
          <?= $_SESSION['msg']?>
      </div>
      <?php unset($_SESSION['msg']);}?>
      
      <div class="row">
        <div class="col-12">
          <div class="card">

            
            <div class="card-body">
              <h4 style="text-align: center;">Exam fees Details
             </h4>          
              <div class="table-responsive">
                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>S.no</th>
                      <th>Student Name</th> 
                    <!--   <th>Application Number</th>  -->                    
                      <th>Registration Number</th>                     
                      <th>Department</th> 
                      <th>Year of studying</th>
                      <th>Semester</th>
                      <th>Subjects</th>
                      <th>total</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                   // $result = mysqli_query($connection,"SELECT * FROM student ORDER BY studentId DESC") or die(mysqli_error());
                    $i = 1;
                    while($row = mysqli_fetch_array( $result )) 
                    {
                      echo "<tr>";
                      echo '<td>' . $i++ . '</td>';
                      echo '<td>' . $row['firstName'] . '</td>';
                      // echo '<td>' . $row['applicationNumber'] . '</td>';
                      echo '<td>' . $row['registerNumber'] . '</td>';                     
                      echo '<td align="center">' . strtoupper($row['department']) . '</td>';
                     
                      echo '<td align="center">' . $row['yearOfStudying'] . '</td>'; 
                      echo '<td align="center">' . $row['semester'] . '</td>'; 
                      echo '<td align="center">' . $row['subjects'] . '</td>'; 
                      echo '<td align="center">' . $row['total'] . '</td>';                      
                      echo '                        <td>
                      <a href="exam-fees-view.php?id='.$row['id'].' ">
                      <i class="fa fa-eye" title="View" style="color:#1c8fb7; font-size:17px;"></i></a>
                      &nbsp;&nbsp;';

                     
                      
                    
                      echo '</td>'; 
                      echo "</tr>";
                    }
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
    <!-- End Container fluid  -->
    <!-- footer -->
    <?php include "footer.php"; ?>
    <script type="text/javascript">
      $(document).ready( function () {
    $('#example23').DataTable();

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

      
     $("#student_form").submit(function(event) 
     {
          $("#department").val($_POST['department']);
      
      });

    </script>

<?php include "header.php";


if(isset($_POST['studentType']) ||  isset($_POST['department']) || isset($_POST['yearOfStudying']) || isset($_POST['from_date']) || isset($_POST['to_date'])) 
{
   $from_date=date("Y-m-d",strtotime($_POST['from_date']));
   $to_date=date("Y-m-d",strtotime($_POST['to_date']));
   $department=$_POST['department'];
   $yearOfStudying=$_POST['yearOfStudying'];
   $f_date=$_POST['from_date'];
    $t_date=$_POST['to_date'];
    $studentType=$_POST['studentType'];
   
$result = mysqli_query($connection,"SELECT * FROM student s where s.studentType='".$_POST['studentType']."' AND  s.department='".$_POST['department']."' AND s.yearOfStudying='".$_POST['yearOfStudying']."' AND CAST(s.updated_on as date) BETWEEN'".$from_date."'  AND '".$to_date."' ORDER BY studentId DESC") or die(mysqli_error());
}
else
{
  $result = mysqli_query($connection,"SELECT * FROM student ORDER BY studentId DESC") or die(mysqli_error());
}


include "left-menu.php";
?>
<div class="page-wrapper">
  <!-- Bread crumb -->
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-primary">List of Students</h3> </div>
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
                                                    <select class="form-control" id="department" name="department" required="true" value="">
                                                        <option value="" >Choose Department</option>

                                                          <?php $departments=mysqli_query($connection,"SELECT * FROM departments ORDER BY dept_name ASC") or die(mysqli_error());
                                                           if(isset($departments)){ while($departments_result = mysqli_fetch_array( $departments )) {
                                                                 
                                                            ?>

                                                            <option value="<?php echo $departments_result['dept_name']; ?>" <?php if (isset($department) && $department==$departments_result['dept_name']) echo "selected";?>><?php echo $departments_result['dept_name']; ?></option>
                                                              <?php }} ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
 
                                        <div class="col-md-3">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="val-email">Year of studying<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="yearOfStudying" name="yearOfStudying" required="true"  >
                                                     
                                                        <option value="">Select</option>
                                                        <option value="I"<?php if (isset($yearOfStudying) && $yearOfStudying=="I") echo "selected";?>>First year</option>
                                                        <option value="II" <?php if (isset($yearOfStudying) && $yearOfStudying=="II") echo "selected";?>>Second year</option> 
                                                        <option value="III"<?php if (isset($yearOfStudying) && $yearOfStudying=="III") echo "selected";?>>Third year</option> 
                                                        <option value="IV"<?php if (isset($yearOfStudying) && $yearOfStudying=="IV") echo "selected";?>>Fourth year</option>                
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-2">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label"  for="dateOfBirth">From Date <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="from_date" autocomplete="off" name="from_date" value="<?php if (isset($yearOfStudying)){ echo $f_date; } ?>" placeholder="From Date" >
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-2">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label"  for="dateOfBirth">To Date <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="to_date" autocomplete="off" name="to_date" value="<?php if (isset($yearOfStudying)){ echo $t_date; } ?>" placeholder="To Date" >
                                                </div>
                                            </div>
                                        </div>

                                     

                                         <div class="col-md-2">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label"  for="dateOfBirth">Student Type <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="studentType" name="studentType" required="true">
                                                        <option value="">Select</option>
                                                        <option value="H" <?php if (isset($studentType) && $studentType=="H") echo "selected";?> >Hostel</option>
                                                        <option value="DS" <?php if (isset($studentType) && $studentType=="DS") echo "selected";?>>Dayschollar</option> 
                                                                   
                                                    </select>
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
              <h2 style="text-align: center;">Student Details</h2>          
              <div class="table-responsive m-t-40">
                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>S.no</th>
                      <th>Student Name</th> 
                    <!--   <th>Application Number</th>  -->                    
                      <th>Registration Number</th>
                      <th>Date Of Birth </th>
                      <th>Department</th>                      
                      <th>Phone Number </th>
                      <th>Year of studying</th>
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
                      echo '<td>' . $row['dateOfBirth'] . '</td>';
                      echo '<td align="center">' . strtoupper($row['department']) . '</td>';
                      echo '<td>' . $row['mobile'] . '</td>';
                      echo '<td align="center">' . $row['yearOfJoining'] . '</td>';                      
                      echo '                        <td>
                      <a href="student-view.php?id='.$row['studentId'].' ">
                      <i class="fa fa-eye" title="View" style="color:#1c8fb7; font-size:17px;"></i></a>
                      &nbsp;&nbsp; <!--
                      <a href="edit-student.php?id='.$row['studentId'].' "><i class="fa fa-pencil-square-o" 
                      <i class="fa fa-pencil" title="Edit" style="color:green;font-size:17px;"></i></a>
                      &nbsp;&nbsp; -->
                      </td>'; 
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
    </script>
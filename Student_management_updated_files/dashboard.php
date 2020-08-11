<?php include "header.php";

$query = "SELECT count(studentId) studentId FROM student";
$result = mysqli_query($connection,$query) or die(mysqli_error());
$row = mysqli_fetch_assoc($result);

$query1 = "SELECT count(studentId) studentId FROM studentfees WHERE tutionFeeDue = 0 AND travelHostelDue = 0 ";
$result1 = mysqli_query($connection,$query1) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT count(studentId) studentId FROM studentfees WHERE tutionFeeDue > 0 AND travelHostelDue > 0 ";
$result2 = mysqli_query($connection,$query2) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result2);

$query3 = "SELECT SUM(tutionFeeDue+travelHostelDue+pretutionFeeDue+pretravelHostelDue) totalamountpending FROM studentfees WHERE tutionFeeDue > 0 AND travelHostelDue > 0 ";
$result3 = mysqli_query($connection,$query3) or die(mysqli_error());
$row3 = mysqli_fetch_assoc($result3);
$totalpendingamount=($row3['totalamountpending'] > 0)? $row3['totalamountpending'] : 0;

/*$chart_res = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.department,SUM(studentfees.finaltutionfee)+SUM(studentfees.finalhostelfee) totalamount,SUM(studentfees.tutionFeeDue)+
    SUM(studentfees.travelHostelDue) paidamount, SUM(studentfees.pretutionFeeDue)+
    SUM(studentfees.pretravelHostelDue) paidpreamt
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId Group by student.department") or die(mysqli_error()); */

 $chart_res =  mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.department,SUM(studentfees.finaltutionfee)+SUM(studentfees.finalhostelfee) totalamount,SUM(studentfees.tutionFeeDue)+
    SUM(studentfees.travelHostelDue) paidamount, SUM(studentfees.pretutionFeeDue)+
    SUM(studentfees.pretravelHostelDue) paidpreamt
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId Group by student.department") or die(mysqli_error());


 $department_query =mysqli_query($connection,"SELECT student.department,COUNT(sp.studentId)as std_paid,COUNT(student.studentId) totalstudent,ifnull(COUNT(student.studentId) - COUNT(sp.studentId),0 )as std_unpaid,SUM(studentfees.finaltutionfee)+SUM(studentfees.finalhostelfee) totalamount,SUM(studentfees.tutionFeeDue)+
    SUM(studentfees.travelHostelDue) paidamount, SUM(studentfees.pretutionFeeDue)+
    SUM(studentfees.pretravelHostelDue) paidpreamt
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId           
           LEFT JOIN (SELECT * from studentfees sf  WHERE sf.tutionFeeDue = 0 AND sf.travelHostelDue = 0)sp on studentfees.studentId=sp.studentId
        GROUP by student.department");


/*while($chart_result_row = mysqli_fetch_assoc($chart_res)){
	echo"<pre>";print_r($chart_result_row);echo"</pre>";
}*/


//exit;
/*$totalamt4=$row4['paidamount']+$row4['paidpreamt'];
$sub4 = $row4['totalamount']-($row4['paidamount']+$row4['paidpreamt']);*/
//$sub4 = $row4['totalamount']-$row4['paidamount'];
// $mechperc1= (($sub4 /$row4['totalamount'])*100);
// $mechperc = ($mechperc1 >0) ? $mechperc1 : 0;




// $mbal = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.department,SUM(studentfees.tutionFeeDue)+
//     SUM(studentfees.travelHostelDue) paidamount
//           FROM student 
//           INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.department = 'MECH'  paidamount > 0 ") or die(mysqli_error()); 
// $val = mysqli_fetch_assoc($mbal);
// $sub13 = $row13['totalamount']-$row13['paidamount'];
// $baperc= (($sub13/$row13['totalamount'])*100);

// echo $val['totalstudent'];
/*$mbal = mysqli_query($connection,"SELECT student.studentId , student.firstName , student.lastName ,   payment_history.tutition_fee , payment_history.hos_dys_fee ,payment_history.student_id  FROM student INNER JOIN payment_history ON student.studentId = payment_history.student_id ORDER BY payment_history.id DESC LIMIT 5") or die(mysqli_error()); 
while($row = mysqli_fetch_array($mbal))*/

// $mbal = mysqli_query($connection,"SELECT * FROM payment_history ORDER BY id DESC LIMIT 5") or die(mysqli_error()); 
// while($rows = mysqli_fetch_array($mbal))
// {
    
    /*echo $rows['tutition_fee'] ;
    echo $rows['hos_dys_fee'] ; 
    // echo $row['firstName'] ; 
    // echo  $row['lastName'] ;
    echo  $rows['student_id'] ;
    echo $rows['firstName'] ; */ 


$mbal1 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.department,studentfees.tutionFeeDue tutiondue,
    studentfees.travelHostelDue hostelamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.department = 'CIVIL' AND studentfees.tutionFeeDue = 0 AND studentfees.travelHostelDue = 0 ") or die(mysqli_error()); 
$val1 = mysqli_fetch_assoc($mbal1);


$mbal2 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.department,studentfees.tutionFeeDue tutiondue,
    studentfees.travelHostelDue hostelamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.department = 'MECH' AND studentfees.tutionFeeDue = 0 AND studentfees.travelHostelDue = 0 ") or die(mysqli_error()); 
$val2 = mysqli_fetch_assoc($mbal2);


$mbal3 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.department,studentfees.tutionFeeDue tutiondue,
    studentfees.travelHostelDue hostelamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.department = 'IT' AND studentfees.tutionFeeDue = 0 AND studentfees.travelHostelDue = 0 ") or die(mysqli_error()); 
$val3 = mysqli_fetch_assoc($mbal3);


$mbal4 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.department,studentfees.tutionFeeDue tutiondue,
    studentfees.travelHostelDue hostelamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.department = 'CSE' AND studentfees.tutionFeeDue = 0 AND studentfees.travelHostelDue = 0 ") or die(mysqli_error()); 
$val4 = mysqli_fetch_assoc($mbal4);


$mbal5 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.department,studentfees.tutionFeeDue tutiondue,
    studentfees.travelHostelDue hostelamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.department = 'ECE' AND studentfees.tutionFeeDue = 0 AND studentfees.travelHostelDue = 0 ") or die(mysqli_error()); 
$val5 = mysqli_fetch_assoc($mbal5);


$mbal6 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.department,studentfees.tutionFeeDue tutiondue,
    studentfees.travelHostelDue hostelamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.department = 'E&I' AND studentfees.tutionFeeDue = 0 AND studentfees.travelHostelDue = 0 ") or die(mysqli_error()); 
$val6 = mysqli_fetch_assoc($mbal6);


$mbal7 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.department,studentfees.tutionFeeDue tutiondue,
    studentfees.travelHostelDue hostelamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.department = 'EEE' AND studentfees.tutionFeeDue = 0 AND studentfees.travelHostelDue = 0 ") or die(mysqli_error()); 
$val7 = mysqli_fetch_assoc($mbal7);


$mbal8 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.department,studentfees.tutionFeeDue tutiondue,
    studentfees.travelHostelDue hostelamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.department = 'MBA' AND studentfees.tutionFeeDue = 0 AND studentfees.travelHostelDue = 0 ") or die(mysqli_error()); 
$val8 = mysqli_fetch_assoc($mbal8);


$mbal9 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.department,studentfees.tutionFeeDue tutiondue,
    studentfees.travelHostelDue hostelamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.department = 'Science and Humanities' AND studentfees.tutionFeeDue = 0 AND studentfees.travelHostelDue = 0 ") or die(mysqli_error()); 
$val9 = mysqli_fetch_assoc($mbal9);


$mbal10 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.department,studentfees.tutionFeeDue tutiondue,
    studentfees.travelHostelDue hostelamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.department = 'BARCH' AND studentfees.tutionFeeDue = 0 AND studentfees.travelHostelDue = 0 ") or die(mysqli_error()); 
$val10 = mysqli_fetch_assoc($mbal10);



$resultyear1 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.yearOfJoining,SUM(studentfees.finaltutionfee)+SUM(studentfees.finalhostelfee) totalamount,SUM(studentfees.tutionFeeDue)+
    SUM(studentfees.travelHostelDue) paidamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.yearOfJoining = '2014' ") or die(mysqli_error()); 
$rowyear1 = mysqli_fetch_assoc($resultyear1);
$subyear1 = $rowyear1['totalamount']-$rowyear1['paidamount'];
//$sum1= (($subyear1/$rowyear1['totalamount'])*100);





$resultyear2 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.yearOfJoining,SUM(studentfees.finaltutionfee)+SUM(studentfees.finalhostelfee) totalamount,SUM(studentfees.tutionFeeDue)+
    SUM(studentfees.travelHostelDue) paidamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.yearOfJoining = '2015' ") or die(mysqli_error()); 
$rowyear2 = mysqli_fetch_assoc($resultyear2);
$subyear2 = $rowyear2['totalamount']-$rowyear2['paidamount'];
//$sum2= (($subyear2/$rowyear2['totalamount'])*100);



$resultyear3 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.yearOfJoining,SUM(studentfees.finaltutionfee)+SUM(studentfees.finalhostelfee) totalamount,SUM(studentfees.tutionFeeDue)+
    SUM(studentfees.travelHostelDue) paidamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.yearOfJoining = '2016' ") or die(mysqli_error()); 
$rowyear3 = mysqli_fetch_assoc($resultyear3);
$subyear3 = $rowyear3['totalamount']-$rowyear3['paidamount'];
//$sum3= (($subyear3/$rowyear3['totalamount'])*100);
// echo $sum3;
// exit;





$resultyear4 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.yearOfJoining,SUM(studentfees.finaltutionfee)+SUM(studentfees.finalhostelfee) totalamount,SUM(studentfees.tutionFeeDue)+
    SUM(studentfees.travelHostelDue) paidamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.yearOfJoining = '2017' ") or die(mysqli_error()); 
$rowyear4 = mysqli_fetch_assoc($resultyear4);
$subyear4 = $rowyear4['totalamount']-$rowyear4['paidamount'];
//$sum4= (($subyear4/$rowyear4['totalamount'])*100);
//echo $sum4;

//exit;



$resultyear5 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.yearOfJoining,SUM(studentfees.finaltutionfee)+SUM(studentfees.finalhostelfee) totalamount,SUM(studentfees.tutionFeeDue)+
    SUM(studentfees.travelHostelDue) paidamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.yearOfJoining = '2018' ") or die(mysqli_error()); 
$rowyear5 = mysqli_fetch_assoc($resultyear5);
$subyear5 = $rowyear5['totalamount']-$rowyear5['paidamount'];
//$sum5= (($subyear5/$rowyear5['totalamount'])*100);
// echo $sum5;
// exit;

// echo $sum;
// exit;


$resultyear3 = mysqli_query($connection,"SELECT COUNT(student.studentId) totalstudent,student.yearOfJoining,SUM(studentfees.finaltutionfee)+SUM(studentfees.finalhostelfee) totalamount,SUM(studentfees.tutionFeeDue)+
    SUM(studentfees.travelHostelDue) paidamount
          FROM student 
          INNER JOIN studentfees ON student.studentId = studentfees.studentId WHERE student.yearOfJoining = '2016' ") or die(mysqli_error()); 
$rowyear3 = mysqli_fetch_assoc($resultyear3);
$subyear3 = $rowyear3['totalamount']-$rowyear3['paidamount'];





include "left-menu.php";

?>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h5>Total </h5>
                                <h5><?php echo $row['studentId']; ?></h5>
                                <p class="m-b-0">Students</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span> 
                            </div>
                            <div class="media-body media-text-right">
                                <h5>Fees Paid</h5>
                                <h5><?php echo $row1['studentId']; ?></h5>
                                <p class="m-b-0">Students</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h5>Fees Pending</h5>
                                <h5><?php echo $row2['studentId']; ?></h5>
                                <p class="m-b-0">Students</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h5>Total Pending Amount </h5>
                                <h5>₹<?php echo $totalpendingamount ;?></h5>
                                <p class="m-b-0">Pending</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row bg-white m-l-0 m-r-0 box-shadow ">

                <!-- column -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Extra Area Chart</h4>
                            <div id="extra-area-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body browser">
                        	<?php 
                    while($chart_results_row = mysqli_fetch_assoc($chart_res)) 
                    { 
                    	//echo"<pre>";print_r($chart_results_row);echo"</pre>";
                    	$total_amt=$chart_results_row['paidamount']+$chart_results_row['paidpreamt'];
						$sub_total = $chart_results_row['totalamount']-($chart_results_row['paidamount']+$chart_results_row['paidpreamt']);

						if($sub_total !=0 && $chart_results_row !=0){
						$final_res= (($sub_total/$chart_results_row['totalamount'])*100);
						}
				else{
 						 $final_res=0;
					}
						$final_result = $final_res;

                          echo" <p class='m-t-30 f-w-600'> ".$chart_results_row['department']."<span class='pull-right'>". round($final_result,2)."%</span></p>
                            <div class='progress'>
                                <div role='progressbar' style='width: ".$final_result."%; height:8px;'class='progress-bar bg-success wow animated progress-animated'> <span class='sr-only'>60% Complete</span> </div>
                            </div>";
                           }  ?>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="row">
             
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Department Wise </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Dept</th>
                                        <th>No Of Students</th>
                                        <th>No Of Students Paid the Fees</th>
                                        <th>No Of Students Fees Pending</th>
                                        <th>Total Amount Pending</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                  <?php
                 
                    $i = 1;
                    if(isset($department_query)){
                    while($department_result = mysqli_fetch_assoc($department_query)) 
                    {
                    	$totalamt_pending=$department_result['paidamount']+$department_result['paidpreamt'];

                     echo "<tr>";
                      echo '<td>' . $i++ . '</td>';
                      echo '<td>' . $department_result['department'] . '</td>';
                      echo '<td>' . $department_result['totalstudent'] . '</td>';
                      echo '<td>' . $department_result['std_paid'] . '</td>';
                       echo '<td>' . $department_result['std_unpaid'] . '</td>';
                      //echo '<td>' . $row['bnk_ref_no'] . '</td>';
                      echo '<td>' . $totalamt_pending . '</td>';

                                 $i++;  } }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
         <div class="col-lg-8">
          <div class="row">
              <div class="col-lg-6">
               <div class="card">
                <div class="card-title">
                 <h4>Recent Paid student</h4>
             </div>
             <div class="recent-comment">
               
<?php
                $mbal = mysqli_query($connection,"SELECT * FROM payment_history ORDER BY id DESC LIMIT 5") or die(mysqli_error()); 
while($rows = mysqli_fetch_array($mbal))
{
    ?>

           <div class="media">
              <div class="media-left">
               <!-- <a href="student-view.php?id=<?php echo $rows['student_id'];?> class="media-object">...</a> -->
           </div>
           <div class="media-body">
               <h4 class="media-heading"><a href="student-view.php?id=<?php echo $rows['student_id'];?>"><?php echo $rows['firstName'];?></h4>
               <p>Tution Fees : <?php echo $rows['tutition_fee'];?>  <br>Hostel Fees :<?php echo $rows['hos_dys_fee'];?><br> payment Mode : <?php echo $rows['payment_mode'];?> </p>
               <p class="comment-date"><?php echo $rows['pay_date'];?></p></a>
           </div>
        </div>
        <?php } ?>

    
</div>
</div>
<!-- /# card -->
</div>
<!-- /# column -->
<div class="col-lg-6">
   <div class="card">
    <div class="card-body">
     <div class="year-calendar"></div>
 </div>
</div>
</div>


</div>
</div>

<div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Yearly Wise</h4>
            <div class="card-content">
                <div class="todo-list">
                    <div class="tdl-holder">
                        <div class="tdl-content">
                            <ul>
                              <?php $yearwise_payment_query = mysqli_query($connection,"SELECT YEAR(cast(updated_date as date)) as year,SUM(totalFees)+SUM(serviceCharge) as fees_collection FROM `payment_history`  GROUP BY YEAR(cast(updated_date as date))") or die(mysqli_error()); 


                              while($yearwise_payment_result = mysqli_fetch_array($yearwise_payment_query))
                            {
                              $amount = $yearwise_payment_result['fees_collection'];
                              setlocale(LC_MONETARY, 'en_IN');
                              $tot_amount = number_format( $amount);
                              
                               ?>
                               <a href="yaerwise_payment_report.php?year=<?php echo $yearwise_payment_result['year']; ?>" class="ti-close"> 
                                <li>
                                    <!-- <label>
                                       <input type="checkbox"><i class="bg-primary"></i><span>Build an angular app</span>
                                       
                                   </label> -->
                                  <label> <?php echo $yearwise_payment_result['year'].'----------------'.$tot_amount;?></label>
                               </li></a>
                               
             <?php } ?>
           </ul>
       </div>
       <!-- <input type="text" class="tdl-new form-control" placeholder="Type here"> -->
   </div>
</div>
</div>
</div>
</div>
</div>

</div>


<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<!-- footer -->
<footer class="footer"> © 2018 All rights reserved.by <a href="https://colorlib.com/">AIHT</a></footer>
<!-- End footer -->

<!-- End Wrapper -->
<!-- All Jquery -->
<script src="js/lib/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="js/lib/bootstrap/js/popper.min.js"></script>
<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->


<!-- Amchart -->
<script src="js/lib/morris-chart/raphael-min.js"></script>
<script src="js/lib/morris-chart/morris.js"></script>
<script src="js/lib/morris-chart/dashboard1-init.js"></script>


<script src="js/lib/calendar-2/moment.latest.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/semantic.ui.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/prism.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/pignose.init.js"></script>

<script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
<script src="js/scripts.js"></script>
<!-- scripit init-->

<script src="js/custom.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->

</body>


<!-- Mirrored from colorlib.com/polygon/elaadmin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Jul 2018 07:51:28 GMT -->
</html>
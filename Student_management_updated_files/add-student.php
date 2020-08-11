
<?php 
include ("header.php"); 
include ("left-menu.php");

if(!empty($_GET['firstName'])){
    switch($_GET['firstName']){
        case 'succ':
        $statusMsgClass = 'alert-success';
        $statusMsg = 'Members data has been inserted successfully.';
        break;
        case 'err':
        $statusMsgClass = 'alert-danger';
        $statusMsg = 'Some problem occurred, please try again.';
        break;
        case 'invalid_file':
        $statusMsgClass = 'alert-danger';
        $statusMsg = 'Please upload a valid CSV file.';
        break;
        default:
        $statusMsgClass = '';
        $statusMsg = '';
    }
}
$err = false;
if(isset($_POST['submit'])) {
    $studentAray = checkStudentExists($_POST['registerNumber']);
    if(isset($studentAray) && count($studentAray) > 1) {
        $err = true;
        $err_msg = "Student already exists!";
    } else {
        $formData = array(
            'applicationNumber' => $_POST['applicationNumber'],
            'firstName' => $_POST['firstName'],
            "lastName" => $_POST['lastName'],
            "registerNumber" => $_POST['registerNumber'],
            "dateOfBirth" => date("Y-m-d",strtotime($_POST['dateOfBirth'])),
            "department" => $_POST['department'],
            "yearOfStudying" => $_POST['yearOfStudying'],
            "yearOfJoining" => $_POST['yearOfJoining'],
            "emailId" => $_POST['emailId'],
            "mobile" => $_POST['mobile'],
            "address" => $_POST['address'],
            "city" => $_POST['city'],
            "state" => $_POST['state'],
            "locality" => $_POST['locality'],
            "zip_code" => $_POST['zip_code'],
            "quota" => $_POST['quota'],
            "first_graduation"=>$_POST['firstgraduation'],
            "studentType" => $_POST['studentType'],
            "password" => "welcome"
        );
        $last_insert_id = dbRowInsert('student', $formData);
        //echo($last_insert_id);

        $student_fees_aray = array(
            "studentId" =>  $last_insert_id,
            "tutionFees" => $_POST['tutionFees'],
            "hostelfees" => $_POST['fees'],
            "previoustutionDue" => $_POST['previousTutionDue'],
            "previoushostelDue" =>$_POST['previousHostelBusDue'],
            "firstGrConcession" => $_POST['firstGrConcession'],
            "scTutionFeeConcession" => $_POST['scTutionFeeConcession'],
            "totalFees" => $_POST['totalFees'],

            "finaltutionfee" => (($_POST['tutionFees']+$_POST['previousTutionDue'])-($_POST['firstGrConcession']+$_POST['scTutionFeeConcession'])),

            "finalhostelfee"  =>$_POST['fees']+$_POST['previousHostelBusDue'],

            "tutionFeeDue" =>($_POST['tutionFees'])-($_POST['firstGrConcession']+$_POST['scTutionFeeConcession']),

            "travelHostelDue"=>$_POST['fees'],
            "pretutionFeeDue" => $_POST['previousTutionDue'],
            "pretravelHostelDue" =>$_POST['previousHostelBusDue'],

            "totalFeesdue" => $_POST['totalFeesdue'],

            "paymentType" => $_POST['paymentType'],
        );
        $last_insert_id = dbRowInsert('studentfees', $student_fees_aray); 
        
        echo "<script>
        alert('New student added successfully!')
        window.location.href='student-details.php'
        </script>";

        $fees =array(
            "student_id" =>  $last_insert_id,
           "tutionFees" => $_POST['tutionFees'],
            "hostelFees" => $_POST['fees'],


        );
    }
}
$currentYear = date("Y");
?>
<!-- End header header -->
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ADD STUDENT DETAILS</h3> </div>
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
            <h2 style="text-align: center;"> STUDENT DETAILS</h2>
            <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
            <div class="col-lg-12">
                <form action="importData.php" method="post" enctype="multipart/form-data" id="importFrm" >
                    <input type="file" name="file" />
                    <input type="submit" class="btn btn-primary" name="importsubmit" value="IMPORT">
                </form>

            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <?php 
                            if($err == true) {
                                ?>
                                <span class="error"><?php echo $err_msg;?> </span>    
                                <?php
                            }
                            ?>
                            <div class="form-validation">
                                <form class="form-valide" id="student_form" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label"  for="applicationNumber">Application Number <span class="text-danger"></span></label>
                                                <div class="col-md-9">
                                                    <input type="text" autocomplete="off" class="form-control" id="applicationNumber"  name="applicationNumber" placeholder="Student application no">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" autocomplete="off" for="val-email">Quota<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="quota" name="quota">
                                                        <option value="">Select</option>
                                                        <option value="MQ">Management Quota</option>
                                                        <option value="GQ">General Quota</option>                
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" autocomplete="off" for="val-email">Student Type <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="studentType" name="studentType">
                                                        <option value="">Select</option>
                                                        <option value="H">Hostel</option>
                                                        <option value="DS">Day Scholar</option>                
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">

                                                <label class="col-md-12 col-form-label" for="firstName">First Name <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control validate" id="firstName" autocomplete="off" name="firstName" 
                                                    value="<?php echo (isset($_POST["firstName"])) ? $_POST["firstName"] : "" ; ?>" oninput="this.value = this.value.replace(/[^A-Za-z.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Student firstname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="lastName">Last Name <span class="text-danger"></span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="lastName" name="lastName" autocomplete="off" oninput="this.value = this.value.replace(/[^A-Za-z.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Student lastname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="registerNumberl">Registration Number <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="registerNumber" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="registerNumber" autocomplete="off" placeholder="Student register no">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label"  for="dateOfBirth">Date Of Birth <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="dateOfBirth" autocomplete="off" name="dateOfBirth" value="10/24/2000" placeholder="Student DOB">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="department">Department <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                     <select class="form-control" id="department" name="department" required="true" value="">
                                                        <option value="" >Choose Department</option>

                                                          <?php $departments=mysqli_query($connection,"SELECT * FROM departments ORDER BY dept_name ASC") or die(mysqli_error());
                                                           if(isset($departments)){ while($departments_result = mysqli_fetch_array( $departments )) {
                                                                 
                                                            ?>

                                                            <option value="<?php echo $departments_result['dept_name']; ?>" ><?php echo $departments_result['dept_name']; ?></option>
                                                              <?php }} ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="val-email">Year of studying<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="yearOfStudying" name="yearOfStudying">
                                                        <option value="">Select</option>
                                                        <option value="I">First year</option>
                                                        <option value="II">Second year</option> 
                                                        <option value="III">Third year</option> 
                                                        <option value="IV">Fourth year</option>                
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="yearOfJoining">Year Of Joining
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-9">       
                                                    <select name="yearOfJoining" class="form-control" id="yearOfJoining">
                                                        <option value="" >Choose year of joining</option>
                                                        <?php
                                                        for($i = "2010"; $i <= $currentYear; $i++) {
                                                            ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="emailId">Email ID <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="emailId" name="emailId" placeholder="Student valid email" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="mobile">Phone Number <span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" autocomplete="off" id="mobile" maxlength="10" minlength="10" name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Student phone number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="mobile">Address<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <textarea type="text" class="form-control" id="address" name="address"  placeholder="Student Address"></textarea>

                                                </div>
                                            </div>
                                        </div>
                                          <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="mobile">State<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="state" name="state">
                                                         <option value="">select state</option>
                                                         <?php
                                                            $result = mysqli_query($connection,"SELECT * FROM tbl_states ORDER BY name ASC") or die(mysqli_error());  
                                                            $country_id=101;                  
                                                         while($row = mysqli_fetch_array( $result )) 
                                                         { ?>
                                                                 <option value="<?php echo $row['id'] ?>"><?php echo $row['name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="mobile">City<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="city" name="city">
                                                        <option>Select Cities</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="mobile">Locality<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                     <input type="text" class="form-control" id="locality" name="locality" placeholder="Enter Your Locality" >
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="mobile">Zip Code<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                     <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Enter Your Locality" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">    
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="tutionFees">Previous Tution Due<span class="text-danger"></span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="previousTutionDue" name="previousTutionDue" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="previousTutionDue" value="0" >
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-6">    
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="tutionFees">Previous Hostel/Bus Due<span class="text-danger"></span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="previousHostelBusDue" name="previousHostelBusDue" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="previousHostelBusDue" value="0" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">    
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="tutionFees">Tuition Fees<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="tutionFees" name="tutionFees" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Tuition fees" >
                                                </div>
                                            </div>
                                        </div>
                                          <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="val-email">1'st Graduation<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="firstgraduation" name="firstgraduation">
                                                        <option value="">Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option> 
                                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">    
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="1st year GR Concession">1st GR Concession<span class="text-danger"></span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="grconcession" name="firstGrConcession"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="1st year GR Concession" value="0" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">    
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="SC Tution Fees Concession">PMSS Fees Concession <span class="text-danger"></span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="tutionfeesconcession" name="scTutionFeeConcession" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="SC tution fees concession" value="0" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" id="hosteler">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="Fees">HostelFees / Transport&Food<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="otherFees" name="fees" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Fees" value="0" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="Total Fees">Total Fees<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="totalFees" name="totalFees" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="totalFees" value="0" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="Total Fees with Previous Due">Total Fees with Previous Due<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="totalFeesdue" name="totalFeesdue" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="totalFees" >
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End PAge Content -->
        </div>
        <?php include "footer.php"; ?>
    
<script type="text/javascript">

    $(document).ready(function () {
     $("#student_form").validate({
        rules: {
            studentType : "required",
            quota : "required",
            firstName: "required",
            // lastName: "required",
            registerNumber: "required",
            dateOfBirth:"required",
            department:"required",
            yearOfJoining:"required",
            yearOfStudying:"required",
            fees : "required",
            locality:'required',
            state:'required',
            city:'required',
            zip_code:'required',
            firstgraduation:'required',

            mobile: {
                required:true,
                minlength:10,
                maxlength:10,
                number: true
            },
            emailId: {
                required: true,
                email: true
            },                      
            hostelFees: "required",
            tutionFees: "required",

            totalFees: "required",
            // scTutionFeeConcession: "required",
            // firstGrConcession: "required",
            previousTutionDue : "required",

            previousHostelBusDue : "required",

            address: "required",
            // applicationNumber: "required",
        },
        messages: {

            studentType : "Please select student type",
            firstName: "Please enter student firstname",
            // lastName: "Please enter student lastname",
            registerNumber : "Please enter student register no",
            // scTutionFeeConcession : "Please enter concession if you have",
            // firstGrConcession : "Please enter the first graduate concession",
            fees:"Please enter the student Fees",

            mobile: {
                required:"Please enter student phone number",
                minlength:"10 digits only",
                maxlength:"10 digits only",
                number: "Enter number only!"
            },                      
            emailId: {
                required:"Please enter email ID of the student",
                email:"Enter a valid email ID",
                remote: "Email already in use!"
            },
            department:"Please choose the department of the student", 



            yearOfJoining:"Please select the year of joining of the student",


            dateOfBirth: "Please enter date of birth of student",



            tutionFees:"Please enter tution fees of student",



            yearOfStudying: "Please enter the student current year of studying",

            locality:"Please enter the student current Locality ",

            state:"Please select the student current state ",

             city:"Please select the student current City ",

             zip_code:"Please enter the Zip Code ",

            address: "Please enter the student address",

            firstgraduation:"Please select the firstgraduation Details",

            previousTutionDue:"Please enter the student previous Tution Due",

            previousHostelBusDue:"Please enter the student previous Hostel/Bus Due",
            // applicationNumber: "Please enter the application number of the student",
            quota: "Please enter the student quota",


        },    
        submitHandler: function(form) {
            form.submit();
        },
    });
     
     $("#tutionFees,#grconcession,#tutionfeesconcession,#otherFees,#previousTutionDue,#previousHostelBusDue").change(function() {
         var tutionFees =$("#tutionFees").val();
         var grconcession=$("#grconcession").val();
         var previousTutionDue=$("#previousTutionDue").val();
         var previousHostelBusDue=$("#previousHostelBusDue").val();
         var otherFees=$("#otherFees").val();

         var tutionfeesconcession=$("#tutionfeesconcession").val();
         var totalfees=(parseFloat(tutionFees) - parseFloat(grconcession) - parseFloat(tutionfeesconcession)) + parseFloat(otherFees);
         $("#totalFees").val(totalfees);

         var totalAmt=(parseFloat(tutionFees)+parseFloat(previousTutionDue)+parseFloat(previousHostelBusDue)) - parseFloat(grconcession) - parseFloat(tutionfeesconcession) + parseFloat(otherFees);

         $("#totalFeesdue").val(totalAmt);
     });
     $(function() {
      $('input[name="dateOfBirth"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10)
    }, function(start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });
  });

 }); 


$("#state").change(function(){

    $("#city").empty();

    var state_id=$(this).val();
     var source_select_url ="get_details.php";
      $.ajax({
    type: "GET",
    url: source_select_url,
    data: {"state_id":state_id},   
    dataType: "json",
    success: function(result){

      $.each(result, function (key, cus) {

        $('#city').append(
            $("<option></option>")
              .attr("value", cus.id)
              .text(cus.name)              
          );

      });
    }

});
});
</script>



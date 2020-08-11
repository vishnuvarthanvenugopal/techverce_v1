
<?php 
include 'header.php';
include 'left-menu.php';
$id = $_GET['id'];
$query = "SELECT * FROM student WHERE studentId='$id'";
$result = mysqli_query($connection,$query) or die(mysqli_error());
$row = mysqli_fetch_assoc($result); 




$studentFetch = "SELECT * FROM studentfees WHERE studentId='$id'";
$result = mysqli_query($connection,$studentFetch) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result); 

?>
<!-- End header header -->
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h3 class="text-primary">STUDENT DETAILS</h3> </div>
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
    <?php //print_r($row);print_r($row1); ?>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="#" id="student_form" method="post">
                            <div class="row">
                             <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="applicationNumber">Registration Number <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="applicationNumber"  value="<?php echo $row['registerNumber']; ?>" name="applicationNumber" placeholder="Student application no">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="val-email">Quota<span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="quota" name="quota">
                                            <option value="">Select</option>
                                            <option value="MQ" <?php echo ($row['quota'] == "MQ") ? "selected" : ""; ?>>MQ</option>
                                            <option value="GQ" <?php echo ($row['quota'] == "GQ") ? "selected" : ""; ?>>GQ</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="val-email">Student Type <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="studentType" name="studentType">
                                            <option value="">Select</option>
                                            <option value="H" <?php echo ($row['studentType'] == "H") ? "selected" : ""; ?>>Hostel</option>
                                            <option value="DS" <?php echo ($row['studentType'] == "DS") ? "selected" : ""; ?>>Day Scholar</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-12 col-form-label" for="val-username">First Name <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $row['firstName'];?>"  placeholder="Enter a firstname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="val-email">Last Name <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $row['lastName'];?>" placeholder="Enter a lastname">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="val-email">Student Roll Number or Registration Number <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="registerNumber" name="registerNumber" placeholder="Number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $row['registerNumber'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="val-email">Date Of Birth <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="Your DOB" value="<?php echo $row['dateOfBirth'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="val-email">Department <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="department" name="department" value="<?php echo $row['department']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="val-email">Year of Studying<span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="yearOfStudying" name="yearOfStudying">
                                            <option value="">Select</option>
                                            <option value="I" <?php echo ($row['yearOfStudying'] == "I") ? "selected" : ""; ?>>First Year</option>
                                            <option value="II" <?php echo ($row['yearOfStudying'] == "II") ? "selected" : ""; ?>>Second Year</option>
                                            <option value="III" <?php echo ($row['yearOfStudying'] == "III") ? "selected" : ""; ?>>Third Year</option>
                                            <option value="IV" <?php echo ($row['yearOfStudying'] == "IV") ? "selected" : ""; ?>>Fourth Year</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="val-email">Year Of Joining <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select name="yearOfJoining" class="form-control" id="yearOfJoining">
                                            <option value="" >Choose year of joining</option>
                                            <?php
                                            $currentYear = date("Y");
                                            for($i = "2010"; $i <= $currentYear; $i++) {
                                                ?>
                                                <option value="<?php echo $i; ?>" <?php echo ($row["yearOfJoining"] == $i) ? "selected" : ""; ?> ><?php echo $i; ?></option>
                                                <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="val-email">Email ID <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="val-email" name="emailId" value="<?php echo $row['emailId'];?>" placeholder="Your valid email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="val-email">Phone Number <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $row['mobile'];?>" max-length="10" placeholder="Your phone number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="mobile">Address<span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <textarea type="text" class="form-control" id="address" name="address"  placeholder="Student Address" value=""><?php echo $row['address']; ?></textarea>

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
                                                            $state=$row['state'];  

                                                         while($rows = mysqli_fetch_array( $result )) 
                                                         { ?>
                                                                 <option value="<?php echo $rows['id'] ?>" <?php if($state==$rows['id']){echo 'selected';} ?>><?php echo $rows['name'];?></option>
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
                                                    <input type="hidden" id="city_id" value="<?php echo $row['city'];?>">
                                                </div>
                                            </div>
                                        </div>

                                       

                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="mobile">Locality<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                     <input type="text" class="form-control" id="locality" name="locality" placeholder="Enter Your Locality" value="<?php echo $row['locality']?>">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="mobile">Zip Code<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                     <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Enter Your Locality" value="<?php echo $row['zip_code'] ?>" >
                                                </div>
                                            </div>
                                        </div>


                            <div class="col-md-6">    
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="dueFees">Previous Tuition Due<span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="previousDue" name="previoustutionDue" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Previous Due" value="<?php echo $row1['previoustutionDue'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">    
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="dueFees">Previous Hostel Due<span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="previousDue" name="previoushostelDue" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Previous Due" value="<?php echo $row1['previoushostelDue'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="val-email">Tuition Fees  <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="tutionFees" name="tutionFees" value="<?php echo $row1['tutionFees'];?>" placeholder="Tuition Fees" required>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-12 col-form-label" for="val-email">1'st Graduation<span class="text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="firstgraduation" name="firstgraduation">
                                                        <option value="">Select</option>
                                                        <option value="Yes" <?php if($row['first_graduation']=='Yes'){ echo 'selected'; }?>>Yes</option>
                                                        <option value="No"<?php if($row['first_graduation']=='No'){ echo 'selected'; }?>>No</option> 
                                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                            <div class="col-md-6">    
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="1st year GR Concession">1st year GR Concession<span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="grconcession" name="firstGrConcession"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="1st year GR Concession" value="<?php echo $row1['firstGrConcession'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">    
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="SC Tution Fees Concession">PMSS Fees Concession <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="tutionfeesconcession" name="scTutionFeeConcession" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="SC tution fees concession " value="<?php echo $row1['scTutionFeeConcession'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="val-email">Fees<span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="otherFees" name="hostelFees"  value="<?php echo $row1['hostelFees'];?>" placeholder="Hostel Fees" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="Total Fees">Total Fees<span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="totalFees" name="totalFees" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $row1['totalFees'];?>" placeholder="totalFees" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="Total Fees with Previous Due">Total Fees with Previous Due<span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="totalFeesdue" name="totalFeesdue" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $row1['totalFeesDue']; ?>" placeholder="totalFees" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-md-12 col-form-label" for="val-email">Payment Type <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="paymentType" name="paymentType">
                                            <option value="">Select</option>
                                            <option value="CASH" <?php echo ($row1['paymentType'] == "CASH") ? "selected" : ""; ?>>CASH</option>
                                            <option value="ONLINE" <?php echo ($row1['paymentType'] == "ONLINE") ? "selected" : ""; ?>>ONLINE</option>
                                            <option value="BANKRECEIPT" <?php echo ($row1['paymentType'] == "BANKRECEIPT") ? "selected" : ""; ?>>BANKRECEIPT</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" id="update" name="studenteditsubmit" class="btn btn-primary">Update</button>
                                <a href="student-details.php" class="btn btn-danger">
                                  Close</a>
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
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
           
            $(document).ready(function () {
                 $("#student_form").validate({
                rules: {
                    studentType : "required",
                    quota : "required",
                    firstName: "required",
                    lastName: "required",
                    registerNumber: "required",
                    dateOfBirth:"required",
                    department:"required",
                    yearOfJoining:"required",
                    yearOfStudying:"required",
                     locality:'required',
            state:'required',
            city:'required',
            zip_code:'required',
                    fees : "required",
                   
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
                    scTutionFeeConcession: "required",
                    /*firstGrConcession: "required",*/
                  
                     previousDue : "required",
                  
                    address: "required",
                    applicationNumber: "required",
                },
                messages: {
                  
                    studentType : "Please select quota type",
                    firstName: "Please enter student firstname",
                    lastName: "Please enter student lastname",
                    registerNumber : "Please enter student register no",
                    scTutionFeeConcession : "Please enter concession if you have",
                    firstGrConcession : "Please enter the first graduate concession",
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
                       

                   
                    address: "Please enter the student address",

                     locality:"Please enter the student current Locality ",

            state:"Please select the student current state ",

             city:"Please select the student current City ",

             zip_code:"Please enter the Zip Code ",

                     previousDue:"Please enter the student previous Due",
                                    

                },    
                submitHandler: function(form) {
                    form.submit();
                },
            });
                  $(function() {
                $('#hosteler').hide(); 
                $('#studentType').change(function(){
                    $('#hosteler').show();
                    var studentType = $(this).val();
                    if( studentType == 'DAYSCHOLAR') {
                        $('#otherFees').attr("placeholder", "Day Scholar fees");
                    } else {
                        $('#otherFees').attr("placeholder", "Hostel fees"); 
                    } 
                });
            });
        
             $("#tutionFees,#grconcession,#tutionfeesconcession,#otherFees,#previousDue").change(function() {
             var tutionFees =$("#tutionFees").val();
             var grconcession=$("#grconcession").val();
             var previousDue=$("#previousDue").val();
             var otherFees=$("#otherFees").val();

             var tutionfeesconcession=$("#tutionfeesconcession").val();
             var totalfees=(parseFloat(tutionFees) - parseFloat(grconcession) - parseFloat(tutionfeesconcession)) + parseFloat(otherFees);
             $("#totalFees").val(totalfees);

             var totalAmt=(parseFloat(tutionFees)+parseFloat(previousDue)) - parseFloat(grconcession) - parseFloat(tutionfeesconcession) + parseFloat(otherFees);

             $("#totalFeesdue").val(totalAmt);

         });
           
            }); 




  

    var state_id=$("#state").val();
   // alert(state_id);
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

      $selected_val=$("#city_id").val();

      $("#city").val($selected_val);
    }

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

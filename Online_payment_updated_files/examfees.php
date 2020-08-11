<?php include "header.php";
include "left-menu.php";
?>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
        <div class="row page-titles">
          <div class="col-md-5 align-self-center">
            <h3 class="text-primary">STUDENT EXAM FEES DETAILS</h3> </div>
            <div class="col-md-7 align-self-center">
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol> -->
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <section id="regnocontainer">
    <div class="container" id="regnocontainer" style="padding-top: 50px;">
        <div class="row">
            <div class="col-md-4"></div>                        
            <div class="col-md-4">
                <div class="form-group">
                    <label for="studentRollnumber">Application / register number *</label>
                    <input type="text" class="form-control" id="studentRollnumber" name="studentRollnumber" required="required" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="" />
                   <!--  <span style="color: #1c8fb7">For I<sup>st</sup> year students enter application no</span> -->
                 <p><span id="errorMsg" style="color: #ff0000"></span></p>
                </div>
                <button type="submit" class="btn btn-primary pull-left" id="submit" name="submit">Submit</button>
            </div>
        </div>
    </div>
    <div class="container" style="padding-top:800px; padding-bottom: 100px;">
        <div class="row">
            <div class="col-md-4"></div>                        
            <div class="col-md-4">
            </div>
        </div>
    </div>
</section>  
 <section id="studentDetailSection">   
        <div class="container">
            <div class="row">
                <h2 style="text-align: center";> Exam Fees Details</h2><br>
                <div class="col-md-2">   
                </div>
                <div class="col-md-8">
                    <div class="well well-sm">
                        <form action="exam-payment.php" method="POST" name="paymentDetails" id="paymentDetails" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="studentname">firstName *</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" required="required" value="" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Year"> lastName*</label>
                                        <input type="text" class="form-control" id="lastname"  name="lastname" required="required" value="" readonly/>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Year"> Year *</label>
                                        <input type="text" class="form-control" id="Year"  name="Year" required="required" value="" readonly/>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Year"> Branch *</label>
                                        <input type="text" class="form-control" id="branch"  name="branch" required="required" value="" readonly/>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                    <label for="Registrationno">  Registration Number *</label>
                                    <input type="text" class="form-control" id="Registrationno" name="Registrationno" required="required" value="" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                                <label for="department"> semester *</label>
                                <select name="sem" id="sem" class="form-control">
                                    <option value="">-Select semester-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="sub">sub</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                            <label for="theoryfees"> Examination Fee - Theory *</label>
                            <input type="text" class="form-control addition" id="theoryfees" name="theoryfees"  placeholder="Amount" minlength="1" maxlength="6" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="practicalfees">
                            Examination Fee - Practical *</label>
                            <input type="text" class="form-control addition" id="practicalfees" name="practicalfees" value="0" minlength="1" maxlength="6" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="photocopyfees"> Photo Copy Fee *</label>
                            <input type="text" class="form-control addition" id="photocopyfees" name="photocopyfees" value="0" minlength="1" maxlength="6" />
                        </div>
                    </div>            
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="revaluationfees">Revaluation Fee *</label>
                            <input type="text" class="form-control addition" id="revaluationfees" name="revaluationfees"  value="0" minlength="1" maxlength="6" />
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <div class="form-group">
                            <label for="provisionalcertificate">Fee For Provisional Certificate *</label>
                            <input type="text" class="form-control addition" id="provisionalcertificate" name="provisionalcertificate"  value="0" minlength="1" maxlength="6" />
                        </div>
                    </div>
                     <div class="col-md-6">
                <div class="form-group">
                    <label for="degreecertificate">Fee For Degree Certificate*</label>
                    <input type="text" class="form-control addition" id="degreecertificate" name="degreecertificate"  value="0" minlength="1" maxlength="6"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="consolidatedmarksheet">Fee For Consolidated Mark Sheet*</label>
                    <input type="text" class="form-control addition" id="consolidatedmarksheet" name="consolidatedmarksheet" value="0" minlength="1" maxlength="6" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="registerfee">A U Registration Fee(I Year & II Lat) *</label>
                    <input type="text" class="form-control addition" id="registerfee" name="registerfee"  value="0" minlength="1" maxlength="6" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="recognfee">A U Recogn Fee(I Year & II Lat)*</label>
                    <input type="text" class="form-control addition" id="recognfee" name="recognfee"  value="0" minlength="1" maxlength="6"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sportsfee">A U Sports Fee(I Year & II Lat)*</label>
                    <input type="text" class="form-control addition" id="sportsfee" name="sportsfee"  value="0" minlength="1" maxlength="6"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="libraryfee">A U Library Fee(I Year & II Lat)*</label>
                    <input type="text" class="form-control addition" id="libraryfee" name="libraryfee" value="0" minlength="1" maxlength="6"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fine">Fine*</label>
                    <input type="text" class="form-control addition" id="fine" name="fine"  value="0" minlength="1" maxlength="6" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="universityfees">University Fees*</label>
                    <input type="text" class="form-control addition" id="universityfees" name="universityfees"  value="0" minlength="1" maxlength="6" />
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                    <label for="total">No.of SubJects*</label>
                    <input type="text" class="form-control addition" id="subjects" name="subjects"  value="0" minlength="1" maxlength="6"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="total">Total*</label>
                    <input type="text" class="form-control addition" id="total" name="total" readonly value="0" minlength="1" maxlength="6"/>
                </div>
            </div>
                   
                    <input type="hidden" name="studentType" id="studentType" value="" readonly="readonly" required>            
                    <input type="hidden" name="student_id" id="student_id" value="">
                    <div class="container-fluid">
                     <div class="col-sm-12 text-center">
                         <button type="submit" class="btn btn-primary" id="payNow" name="payNow">Pay Now</button>
                         <a href="" class="btn btn-warning" title="Cancel" id="btn-cancel"> Cancel </a>
                     </div>
                 </div>            
             </div>
         </form>
     </div>
 </div>
 <div class="col-md-2">
 </div>
</div>
</div>
</section>
<?php include "footer.php"; ?>
<script type="text/javascript">
    $("#studentDetailSection").hide();
    $(".partialType").hide();
    $('.Number').keypress(function (event) {
        var keycode = event.which;
        if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
            event.preventDefault();
        }
    });
    $(document).ready(function () {
  //called when key is pressed in textbox
  $(".addition").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8  && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
 
$(".addition").keyup(function() {
    
    var theoryfees = $("#theoryfees").val();
    var practicalfees = $("#practicalfees").val();
    var photocopyfees = $("#photocopyfees").val();
    var revaluationfees = $("#revaluationfees").val();
    var provisionalcertificate = $("#provisionalcertificate").val();
    var degreecertificate = $("#degreecertificate").val();
    var consolidatedmarksheet = $("#consolidatedmarksheet").val();
    var registerfee = $("#registerfee").val();
    var recognfee = $("#recognfee").val();
    var sportsfee = $("#sportsfee").val();
    var libraryfee = $("#libraryfee").val();
    var fine = $("#fine").val();
    var universityfees = $("#universityfees").val();
        var fullAmt = parseFloat(theoryfees)+parseFloat(practicalfees)+parseFloat(photocopyfees)+parseFloat(revaluationfees)+parseFloat(provisionalcertificate)+parseFloat(degreecertificate)+parseFloat(consolidatedmarksheet)+parseFloat(registerfee)+parseFloat(recognfee)+parseFloat(sportsfee)+parseFloat(libraryfee)+parseFloat(fine)+parseFloat(universityfees) ;
        $("#total").val(fullAmt);

});

    $('#submit').click(function(){    
        $.ajax({
            type: "GET",
            // url: "ajax.php?reg="+$("#studentRollnumber").val()+"&action=fetchdetails",
            // success: function(data) {  
             url: "ajax.php?reg="+$("#studentRollnumber").val()+"&action=fetchdetails",
        success: function(data) {       
               var response = JSON.parse(data);
                if(response.status == "error") {
                    $("#errorMsg").text(response.message);
                }
                if(response.status == "success") {
                    $("#regnocontainer").hide();
                    $("#studentDetailSection").show();
                    $("#firstname").val(response.firstName);
                    $("#lastname").val(response.lastName);
                    $("#Year").val(response.yearOfStudying);
                    $("#branch").val(response.department);
                    $("#Registrationno").val(response.registerNumber); 
                    $("#student_id").val(response.studentId);   
                 }
            }
        });
    });

</script>

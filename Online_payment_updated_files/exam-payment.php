<?php
include"connect.php";
if(isset($_POST['payNow'])) 
{ 
$fees=array(
"studentId" => $_POST['student_id'],
"firstName" => $_POST['firstname'],
"lastName" => $_POST['lastname'],
"registerNumber" => $_POST['Registrationno'],
"yearOfStudying" => $_POST['Year'],
"department" => $_POST['branch'],
"semester" => $_POST['sem'],
"theory_fee" => $_POST['theoryfees'],
"practical_fee" => $_POST['practicalfees'],
"photo_copy_fee" => $_POST['photocopyfees'],
"revaluation _fee" => $_POST['revaluationfees'],
"provisional_certificate_fee" => $_POST['provisionalcertificate'],
"degree_certificate_fee" => $_POST['degreecertificate'],
"consolidated_mark_sheet" => $_POST['consolidatedmarksheet'],
"AU_registration_fee" => $_POST['registerfee'],
"AU_recogn_fee" => $_POST['recognfee'],
"AU_sports_fee" => $_POST['sportsfee'],
"AU_library_fee" => $_POST['libraryfee'],
"fine" => $_POST['fine'],
"university_fees" => $_POST['universityfees'],
"subjects"=>$_POST['subjects'],
"total" => $_POST['total'],
"payment_date"=>date("Y-m-d")
);

// printArray($fees);
// exit;
dbRowInsert('exam_fees', $fees);

echo "<script> alert('payment update successfully')
window.location.href ='examfees.php'	
</script>";

}
?>
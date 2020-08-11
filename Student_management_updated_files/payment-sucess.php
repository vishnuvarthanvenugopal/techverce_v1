<?php 
//echo "Payment sucess";
 //$connection = mysqli_connect('localhost', 'aihtpayment', 'aihtpayment@123');
$connection = mysqli_connect('localhost', 'root', '');
//$connection = mysqli_connect('localhost','test-aiht', 'test-aiht@123');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
//$select_db = mysqli_select_db($connection, 'aiht-payment');
$select_db = mysqli_select_db($connection, 'test-aiht_new');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
function dbRowInsert($tbl_name, $formData)
{
    global $connection;
    // retrieve the keys of the array (column titles)
    $fields = array_keys($formData);

    // build the query
    $sql = "INSERT INTO ".$tbl_name."(`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $formData)."')";
    //echo $sql;
    if (mysqli_query($connection, $sql)) { 
        
        $last_insert_id =  mysqli_insert_id($connection);

    } else { 
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    return $last_insert_id;
    // run and return the query result resource
    /*return mysqli_query($connection,$sql);*/
}

function dbRowUpdate($table_name, $form_data, $where_clause='')
{
    // check for optional where clause
     global $connection;
    $whereSQL = '';
    if(!empty($where_clause))
    {

        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add key word
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE ".$table_name." SET ";

    // loop and build the column /
    $sets = array();
    foreach($form_data as $column => $value)
    {
     $sets[] = "`".$column."` = '".$value."'";
 }
 $sql .= implode(', ', $sets);

    // append the where statement
 $sql .= $whereSQL;
 //echo $sql;
    // run and return the query result
 return mysqli_query($connection,$sql);
}

function selectSingleRow($sql) {
     global $connection;
   $query = mysqli_query($connection, $sql);
   return mysqli_fetch_assoc($query);
}


if(isset($_POST['payNow'])) { 
  
     $payType =$_POST['payType'];
    if($payType == "FULL") {

        $tutionfeesAmt = $_POST['tutionfees'];
        $hostelfeesAmt = $_POST['hostelfees'];
        $pretutionfeesAmt = $_POST['previoustutionfees'];
        $prehostelfeesAmt = $_POST['previousHostelfees'];

    } else {
        $tutionfeesAmt = $_POST['partialTutAmt'];
        $hostelfeesAmt = $_POST['partialHDsAmt'];
        $pretutionfeesAmt = $_POST['partialpreTutAmt'];
        $prehostelfeesAmt = $_POST['partialpreHDsAmt']; 
        //  echo $pretutionfeesAmt;
        //  echo $prehostelfeesAmt;
        // exit;
    }

          $student_fees_aray = array(
            "student_id" =>$_POST['student_id'],
            'firstName' => $_POST['firstName'],
            "mobile"=>$_POST['mobile'],
            "email" => $_POST['emailId'],
            "bnk_ref_no"=>$_POST['bnk_ref_no'],
            "pay_date"=> $_POST['pay_date'],
            "payment_mode"=> $_POST['payment_mode'],
            "tutition_fee"=> $tutionfeesAmt,
            "hos_dys_fee"=> $hostelfeesAmt,
            "pre_tutition_fee"=> $pretutionfeesAmt,
            "pre_hos_dys_fee"=> $prehostelfeesAmt,
            // "payment_status" => $payment_status
            "payment_status" => "SUCCESS"
      );
         // print_r($student_fees_aray);
           dbRowInsert('payment_history', $student_fees_aray);

        $studentIds=$_POST['student_id'];
        /*echo $studentIds;
        exit;*/

                $sql1 = "SELECT * FROM studentfees WHERE studentId='$studentIds'";
                $result=mysqli_query($connection,$sql1);
                $row1 = mysqli_fetch_assoc($result);
                $result1=$row1['tutionFeeDue'];  
                $result2=$row1['travelHostelDue'];
                $result3=$row1['pretutionFeeDue'];  
                $result4=$row1['pretravelHostelDue'];
                // echo $result3;
                // echo $result4;
                // exit;

           $student_fees = array(
            
            "tutionFeeDue"=> $result1-$tutionfeesAmt,
            "travelHostelDue"=> $result2-$hostelfeesAmt,
            "pretutionFeeDue"=> $result3-$pretutionfeesAmt,
            "pretravelHostelDue"=> $result4-$prehostelfeesAmt
            /*"tutionFeeDue"=> $result1-$tutionfeesAmt,
            "travelHostelDue"=> $result2-$hostelfeesAmt*/
        );
           //print_r($result1-$tutionfeesAmt);exit;
           //dbRowInsert('studentfees', $student_fees);

           dbRowUpdate('studentfees', $student_fees, "studentId = '".$studentIds."'");

           echo "<script>
        alert('payment Updated successfully!')
        window.location.href='add-payment.php'
        </script>";
         }
?>
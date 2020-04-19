<?php
    session_start();
    global $conn;
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "nbossner";
    $port = 3306;
    
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

        $fName = $_POST['accFname'];
        $lName = $_POST['accLname'];
        $DOB = $_POST['accDOB'];
        $PNumber = $_POST['accPNumber'];
        $Email = $_POST['accEmail'];
        $SSN = $_POST['accSSN'];
        $DEPTID = $_POST['deptID'];

        if (!empty($fName) && !empty($lName) && !empty($DOB) && !empty($PNumber) && !empty($Email) && !empty($SSN) && !empty($DEPTID))
        {
            $sql = "INSERT INTO accountant (ACC_FNAME, ACC_LNAME, ACC_DOB, ACC_PNUMBER, ACCT_EMAIL, ACC_SSN, DEPARTMENT_ID)" . 
            " VALUES ('$fName', '$lName', '$DOB', '$PNumber', '$Email', '$SSN', '$DEPTID')";
                $result = mysqli_query($conn, $sql);
                if (false===$result) { 
				  $error1 = mysqli_error($conn);
				  printf(" error: " . $error1);
				 }
                else
                {
                    header("Location: insertRecordAccountantPayroll.html");
                }
        }
        else
        {
            echo "Please fill in all areas of input box";
            
        }
?>
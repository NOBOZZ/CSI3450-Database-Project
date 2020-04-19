<?php
    session_start();
    global $conn;
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "nbossner";
    $port = 3306;
    
    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $bName = $_POST['bankName'];
    $selectionOption = $_POST['payrollEmp'];
    $bNumber = $_POST['bankNumber'];
    $empID = $_POST['empID'];

    if (!empty($bName) && !empty($selectionOption) && !empty($bNumber) && !empty($empID))
    {
        $sql = "UPDATE payroll_employee
                SET EMP_BANK_NAME = '$bName', EMP_PAY_METHOD = '$selectionOption', 
                EMP_BNK_NUMBER = '$bNumber'
                WHERE EMPLOYEE_ID = '$empID'";

        if (mysqli_query($conn, $sql)){ 
                header("Location: index.html");
        }
        else
        {
                echo "Could not add record: " . $conn->connect_error;
                header("Location: updateRecordEmployeePayroll.html");
        }
    }
	else{
		echo " Please fill in all text fields.";
	}

?>
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
    $selectionOption = $_POST['payrollAcc'];
    $bNumber = $_POST['bankNumber'];
    $accID = $_POST['accID'];

    if (!empty($bName) && !empty($selectionOption) && !empty($bNumber) && !empty($accID))
    {
        $sql = "UPDATE payroll_accountant
                SET ACC_BANK_NAME = '$bName', ACC_PAY_METHOD = '$selectionOption', 
                ACC_BANK_NUMBER = '$bNumber'
                WHERE ACC_ID = '$accID'";

        if (mysqli_query($conn, $sql)){ 
                header("Location: index.html");
        }
        else
        {
                echo "Could not add record: " . $conn->connect_error;
                header("Location: updateRecordAccountantPayroll.html");
        }
    }
	else {
		echo " Please fill in all the text fields";
	}
?>
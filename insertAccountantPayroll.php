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

    $bName = $_POST['bankName'];
    $selectOption = $_POST['payrollAcc'];
    $bNumber = $_POST['bankNumber'];
    $accID = $_POST['accID'];

    if (!empty($bName) && !empty($selectOption) && !empty($bNumber) && !empty($accID))
    {
        $sql = "INSERT INTO payroll_accountant (ACC_BANK_NAME, ACC_PAY_METHOD, ACC_BANK_NUMBER, ACC_ID)" . 
        " VALUES ('$bName', '$selectOption', '$bNumber', '$accID')";
        if (mysqli_query($conn, $sql)){
            header("Location: index.html");
        }
        else
        {
            echo "Could not add record: " . $conn->connect_error;
            header("Location: insertRecordAccountantPayroll.html");
        }
    }
    else
    {
        echo "Please fill in all areas of input box";
        /*header("Location: insertRecordAccountantPayroll.html");*/
    }
?>
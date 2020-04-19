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

    $accID = $_POST['accID'];
    $accFname = $_POST['accFname'];
    $accLname = $_POST['accLname'];
    $accDOB = $_POST['accDOB'];
    $accPnumber = $_POST['accPNumber'];
    $accEmail = $_POST['accEmail'];
    $accSSN = $_POST['accSSN'];
    $accDeptID = $_POST['accDeptID'];

    if (!empty($accID) && !empty($accFname) && !empty($accLname) && !empty($accDOB) && !empty($accPnumber) && !empty($accEmail) && !empty($accSSN) && !empty($accDeptID))
    {
        $sql = "UPDATE accountant
                SET ACC_FNAME = '$accFname', ACC_LNAME = '$accLname', ACC_DOB = '$accDOB',
                ACC_PNUMBER = '$accPnumber', ACCT_EMAIL = '$accEmail', ACC_SSN = '$accSSN',
                DEPARTMENT_ID = '$accDeptID'
                WHERE ACC_ID = '$accID'";

        if (mysqli_query($conn, $sql)){ 
                header("Location: updateRecordAccountantMiddle.html");
        }
        else
        {
                echo "Could not add record: " . $conn->connect_error;
                header("Location: updateRecordAccountant.html");
        }
}
?>
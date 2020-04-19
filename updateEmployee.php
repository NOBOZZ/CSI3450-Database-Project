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

    $empID = $_POST['empID'];
    $empFname = $_POST['empFname'];
    $empLname = $_POST['empLname'];
    $empDOB = $_POST['empDOB'];
    $empPnumber = $_POST['empPNumber'];
    $empEmail = $_POST['empEmail'];
    $empSSN = $_POST['empSSN'];
    $empDeptID = $_POST['empDeptID'];

    if (!empty($empID) && !empty($empFname) && !empty($empLname) && !empty($empDOB) && !empty($empPnumber) && !empty($empEmail) && !empty($empSSN) && !empty($empDeptID))
    {
        $sql = "UPDATE employee
                SET EMP_FNAME = '$empFname', EMP_LNAME = '$empLname', EMP_DOB = '$empDOB',
                EMP_PNUMBER = '$empPnumber', EMP_EMAIL = '$empEmail', EMP_SSN = '$empSSN',
                DEPARTMENT_ID = '$empDeptID'
                WHERE EMPLOYEE_ID = '$empID'";

        if (mysqli_query($conn, $sql)){ 
                header("Location: updateRecordEmployeeMiddle.html");
        }
        else
        {
                echo "Could not add record: " . $conn->connect_error;
                header("Location: updateRecordEmployee.html");
        }
}
?>
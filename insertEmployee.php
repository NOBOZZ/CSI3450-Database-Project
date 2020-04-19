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

    if (isset($_POST['insertRecordEmployee'])){
        $fName = $_POST['empFname'];
        $lName = $_POST['empLname'];
        $DOB = $_POST['empDOB'];
        $PNumber = $_POST['empPNumber'];
        $Email = $_POST['empEmail'];
        $SSN = $_POST['empSSN'];
        $DEPTID = $_POST['deptID'];

        if (!empty($fName) && !empty($lName) && !empty($DOB) && !empty($PNumber) && !empty($Email) && !empty($SSN) && !empty($DEPTID))
        {
            $sql = "INSERT INTO employee (EMP_FNAME, EMP_LNAME, EMP_DOB, EMP_PNUMBER, EMP_EMAIL, EMP_SSN, DEPARTMENT_ID)" . 
            " VALUES ('$fName', '$lName', '$DOB', '$PNumber', '$Email', '$SSN', '$DEPTID')";
                if (mysqli_query($conn, $sql)){
                    header("Location: insertRecordEmployeePayroll.html");
                }
                else
                {
                    echo "Could not add record: " . $conn->connect_error;
                    
                }
        }
        else
        {
            echo "Please fill in all areas of input box";
            
        }
    }
?>
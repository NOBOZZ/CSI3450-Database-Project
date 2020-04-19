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
        $selectOption = $_POST['payrollEmp'];
        $bNumber = $_POST['bankNumber'];
        $empID = $_POST['empID'];

        if (!empty($bName) && !empty($selectOption) && !empty($bNumber) && !empty($empID))
        {
            $sql = "INSERT INTO payroll_employee (EMP_BANK_NAME, EMP_PAY_METHOD, EMP_BNK_NUMBER, EMPLOYEE_ID)" . 
            " VALUES ('$bName', '$selectOption', '$bNumber', '$empID')";
			$result = mysqli_query($conn, $sql);
            if (false===$result){
                $error = mysqli_error($conn);
				printf(" error: " . $error);
            }
            else
            {
                header("Location: index.html");
            }
        }
        else
        {
            echo "Please fill in all areas of input box";
            /*header("Location: insertRecordEmployeePayroll.html");*/
            echo var_dump($sql);
        }
?>
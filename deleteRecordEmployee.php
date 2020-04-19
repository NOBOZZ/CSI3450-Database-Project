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

    $ID = $_POST['empID'];
    
    if (!empty($ID)){
        $sql = "DELETE payroll_employee, employee FROM employee 
                INNER JOIN payroll_employee
                ON employee.EMPLOYEE_ID=payroll_employee.EMPLOYEE_ID
                WHERE payroll_employee.EMPLOYEE_ID=$ID";

        $result = mysqli_query($conn, $sql);

        if (false===$result){
            $error = mysqli_error($conn);
            printf(" error: " . $error);
            /*header("Location: deleteRecordAccountant.html");*/
            echo var_dump($sql);
        }
        else
        {
            header("Location: index.html");
            echo var_dump($sql);
        }
    }
    else
    {
        echo "Please fill in valid ID";
        /*header("Location: deleteRecordAccountant.html");*/
        echo var_dump($sql);
    }
?>
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

    $ID = $_POST['accID'];
    
    if (!empty($ID)){
        $sql = "DELETE payroll_accountant, accountant FROM accountant 
                INNER JOIN payroll_accountant
                ON accountant.ACC_ID=payroll_accountant.ACC_ID
                WHERE payroll_accountant.ACC_ID=$ID";

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
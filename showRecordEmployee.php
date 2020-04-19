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

        $sql = "SELECT * FROM employee";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
			echo "<table>";
            echo "<thead><tr> <td>Employee ID </td><td>First Name </td> <td>Last name </td> 
            <td>Date of Birth</td>  <td>Phone Number</td> <td>Email</td> <td>Social Security Number</td> <td>Department ID</td>";
            while($row = $result->fetch_assoc()){
                $ID = $row['EMP_ID'];
                echo "<tbody><tr>" .
                    " </td> <td> " . $row["EMPLOYEE_ID"] .
                    " </td> <td> " . $row["EMP_FNAME"] .
                    " </td> <td> " . $row["EMP_LNAME"] .
                    " </td> <td> " . $row["EMP_DOB"] .
                    " </td> <td> " . $row["EMP_PNUMBER"] .
                    " </td> <td> " . $row["EMP_EMAIL"] .
                    " </td> <td> " . $row["EMP_SSN"] .
                    " </td> <td> " . $row["DEPARTMENT_ID"] .
                    "</td>";
					
            }
			echo "</table>";
        }
?>
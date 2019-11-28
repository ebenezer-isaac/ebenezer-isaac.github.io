<?php

try {
    $servername = "sql290.main-hosting.eu";
    $username = "u117204720_ebenezerv99";
    $password = "45ebi1999";
    $dbname = "u117204720_ebenezerv99";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM `quiz`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . $row["name"] . " - Feedback: " . $row["feedback"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
} catch (Exception $err) {
    echo $err;
}
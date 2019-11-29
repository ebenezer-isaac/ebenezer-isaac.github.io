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
    $sql = "SELECT name, score FROM `quiz` order by score desc;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<div class='table-responsive'><table class='table'><thead><tr><th>Name</th><th>Score</th></tr></thead><tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["score"] . "</td></tr>";
        }
        echo "</tbody></table><div>";
    } else {
        echo "No Data Found";
    }
    $conn->close();
} catch (Exception $err) {
    echo $err;
}
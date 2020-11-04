<?php
session_start();

// fetching my own company's user
$server = 'localhost';
$username = 'root';
$password = 'password';
$db = 'cmpe272';

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$GLOBALS['conn'] = $conn;

function fetchAll() {
    $conn = $GLOBALS['conn'];
    $query = "select * from user";
    return $conn->query($query);
}



// fetching my team's company user
$ch = curl_init();
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://yohoc.xyz/curl.php");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// grab URL and pass it to the browser
$curl_output = curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

function tableTop() {
    echo <<<_END
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Home Phone</th>
                    <th scope="col">Cell Phone</th>
                </tr>
                </thead>
                <tbody>
_END;
}
function tableBottom() {
    echo "</tbody>";
    echo "</table>";
}

function tableHandler_json($json) {
    $json_array = json_decode($json, true);
    foreach($json_array as $json_obj) {
        echo "<tr>";
        echo '<td>'.$json_obj['firstName'].'</td>';
        echo '<td>'.$json_obj["lastName"].'</td>';
        echo '<td>'.$json_obj["email"].'</td>';
        echo '<td>'.$json_obj["address"].'</td>';
        echo '<td>'.$json_obj["homePhone"].'</td>';
        echo '<td>'.$json_obj["cellPhone"].'</td>';
        echo "</tr>";
    }
}

function tableHandler_sql($sql_rows) {
    while ($row = $sql_rows->fetch_assoc()) {
        echo "<tr>";
        echo '<td>'.$row['firstName'].'</td>';
        echo '<td>'.$row["lastName"].'</td>';
        echo '<td>'.$row["email"].'</td>';
        echo '<td>'.$row["address"].'</td>';
        echo '<td>'.$row["homePhone"].'</td>';
        echo '<td>'.$row["cellPhone"].'</td>';
        echo "</tr>";
    }

    echo "</tbody></table>";
}
?>

<style>
    .card-container {
        padding: 30px 50px;
    }

    .card {
        margin-bottom: 15px;
    }

    .form-group{
        text-align: left;
    }
</style>


<html>
    <head>
        <?php include_once 'reusable/head.php'; ?>
    </head>

    <body>

        <!-- Page title -->
        <?php
            $title = 'All Users';
            ob_start();
            include_once 'reusable/pageHeader.php';
            $output = ob_get_contents();
            $output = str_replace('Placeholder', $title, $output);
            ob_end_clean(); // Clear the buffer.
            echo $output; // Print everything.
         ?>

        <?php include_once 'reusable/nav.php'; ?>


        <div class="card-container">
            <div class="card">
                <h5 class="card-header">Users of All Companies</h5>
                <div class="card-body">
                    <?php
                        tableTop();
                        tableHandler_json($curl_output);
                        tableHandler_sql(fetchAll());
                        tableBottom();
                    ?>
                </div>
            </div>
        </div>

    </body>
</html>

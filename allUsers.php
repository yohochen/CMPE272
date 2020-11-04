<?php
session_start();


function tableHandler($dbRows) {
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

    while ($row = $dbRows->fetch_assoc()) {
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
                    <?php tableHandler(null)?>
                </div>
            </div>
        </div>

    </body>
</html>

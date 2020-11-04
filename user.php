<?php
session_start();

$server = 'localhost';
$username = 'root';
$password = 'password';
$db = 'cmpe272';

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$GLOBALS['conn'] = $conn;
$GLOBALS['allUser'] = fetchAll();
$GLOBALS['searchUser'] = null;

submitDBInput();


function fetchAll() {
    $conn = $GLOBALS['conn'];
    $query = "select * from user";
    return $conn->query($query);
}

function submitDBInput()
{

    if (isset($_POST["createSubmit"])) {
        $conn = $GLOBALS['conn'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $cellPhone = $_POST['cellPhone'];
        $homePhone = $_POST['homePhone'];

        $query = "INSERT INTO user (LastName, FirstName, Address, Email, HomePhone, CellPhone)
            VALUES ('$lastName', '$firstName', '$address', '$email', '$homePhone', '$cellPhone');";
        $conn->query($query) or die($conn->error);
        $GLOBALS['allUser'] = fetchAll();
    }

    if (isset($_POST["searchSubmit"])) {
        $selected = $_POST['searchSelection'];
        $search = $_POST['search'];
        $query = "";

        switch ($selected) {
            case 'name':
                $query = "SELECT * FROM user WHERE FirstName='$search' OR LastName='$search'";
                break;
            case 'email':
                $query = "SELECT * FROM user WHERE Email='$search'";
                break;
            case 'phone':
                $query = "SELECT * FROM user WHERE CellPhone='$search' OR HomePhone='$search'";
                break;
            default:
                break;
        }
        $conn = $GLOBALS['conn'];
        $GLOBALS['searchUser'] = $conn->query($query) or die($conn->error);
    }
}

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

<script>
    function validateCreateForm(form) {
        const {firstName, lastName, email, address, homePhone, cellPhone} = form;

        if (firstName.value.trim().length > 0 &&
            lastName.value.trim().length > 0 &&
            email.value.trim().length > 0 &&
            address.value.trim().length > 0 &&
            homePhone.value.trim().length > 0 &&
            cellPhone.value.trim().length > 0) {
            return true;
        } else {
            alert('Please fill all fields');
            return false;
        }
    }

    function validateSearchForm(form) {
        const {search} = form;

        if (search.value.trim().length > 0) {
            return true;
        } else {
            alert('Please fill all fields');
            return false;
        }
    }
</script>


<html>

    <head>
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                    crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

        <?php include_once 'reusable/head.php'; ?>
    </head>

    <body>

        <!-- Page title -->
        <?php
            $title = 'User';
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
                <h5 class="card-header">Create User</h5>
                <div class="card-body">
                    <form method="POST" action="" onsubmit="return validateCreateForm(this)">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" name="firstName" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="homePhone">Home Phone</label>
                            <input type="text" class="form-control" name="homePhone" placeholder="Enter Home Phone">
                        </div>
                        <div class="form-group">
                            <label for="cellPhone">Cell Phone</label>
                            <input type="text" class="form-control" name="cellPhone" placeholder="Enter Cell Phone">
                        </div>
                        <button type="submit" name='createSubmit' class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <h5 class="card-header">Search User</h5>
                <div class="card-body">
                    <form method="POST" action="" onsubmit="return validateSearchForm(this)">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <select class="custom-select" name="searchSelection">
                                    <option value="name" selected>Name</option>
                                    <option value="email">Email</option>
                                    <option value="phone">Phone</option>
                                </select>
                            </div>
                            <input type="text" class="form-control" name="search">
                        </div>
                        <button type="submit" name='searchSubmit' class="btn btn-dark">Submit</button>
                    </form>
                    <?php
                        if ($GLOBALS['searchUser'] !== null) {
                            tableHandler($GLOBALS['searchUser']);
                        }
                    ?>

                </div>
            </div>

            <div class="card">
                <h5 class="card-header">All Users</h5>
                <div class="card-body">
                    <?php tableHandler($GLOBALS['allUser'])?>
                </div>
            </div>
        </div>

    </body>
</html>

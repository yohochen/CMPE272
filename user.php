<?php
session_start();
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


<!DOCTYPE html>
<html>

    <head>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                    crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                    <form method="POST" action="" onsubmit="return validate(this)">
                        <div class="form-group">
                            <label for="inputId">First Name</label>
                            <input type="text" class="form-control" name="firstName" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="inputId">Last Name</label>
                            <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Home Phone</label>
                            <input type="number" class="form-control" name="homePhone" placeholder="Enter Home Phone">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Cell Phone</label>
                            <input type="number" class="form-control" name="cellPhone" placeholder="Enter Cell Phone">
                        </div>
                        <button type="submit" name='submit' class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <h5 class="card-header">Search User</h5>
                <div class="card-body">
                    <form method="POST" action="" onsubmit="return validate(this)">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item">Name</a>
                                    <a class="dropdown-item">Email</a>
                                    <a class="dropdown-item">Phone Number</a>
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                        </div>
                        <button type="submit" name='submit' class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <h5 class="card-header">User Table</h5>
                <div class="card-body">

                </div>
            </div>
        </div>



    </body>
</html>

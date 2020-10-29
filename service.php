<?php
session_start();
?>
<!DOCTYPE html>


<style>
    .card-container {
        padding: 30px 50px;
        /* background-color: red; */
        text-align: left;
    }
    .card {
        margin: 15px;
    }

    /* .card {
        margin-bottom: 15px;
    } */

</style>

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
    <?php include_once 'reusable/head.php'; ?>

    <body>

        <!-- Page title -->
        <?php
            $title = 'Service';
            ob_start();
            include_once 'reusable/pageHeader.php';
            $output = ob_get_contents();
            $output = str_replace('Placeholder', $title, $output);
            ob_end_clean(); // Clear the buffer.
            echo $output; // Print everything.
         ?>

        <?php include_once 'reusable/nav.php'; ?>

        <div class="card-container">
            <div class="card-deck">
                <a href="teacher.php?t=1" class="card list-group-item-action">
                    <div class="card-body">
                      <h5 class="card-title">Teacher 1</h5>
                      <p class="card-text">Rating: ★★★★★</p>
                    </div>
                </a>
                <a href="teacher.php?t=2" class="card list-group-item-action">
                    <div class="card-body">
                      <h5 class="card-title">Teacher 2</h5>
                      <p class="card-text">Rating: ★★★★</p>
                    </div>
                </a><a href="teacher.php?t=3" class="card list-group-item-action">
                    <div class="card-body">
                      <h5 class="card-title">Teacher 3</h5>
                      <p class="card-text">Rating: ★★★★★</p>
                    </div>
                </a><a href="teacher.php?t=4" class="card list-group-item-action">
                    <div class="card-body">
                      <h5 class="card-title">Teacher 4</h5>
                      <p class="card-text">Rating: ★★★★</p>
                    </div>
                </a><a href="teacher.php?t=5" class="card list-group-item-action">
                    <div class="card-body">
                      <h5 class="card-title">Teacher 5</h5>
                      <p class="card-text">Rating: ★★★★</p>
                    </div>
                </a>
            </div>
            <div class="card-deck">
                <a href="teacher.php?t=6" class="card list-group-item-action">
                    <div class="card-body">
                      <h5 class="card-title">Teacher 6</h5>
                      <p class="card-text">Rating: ★★★★</p>
                    </div>
                </a>
                <a href="teacher.php?t=7" class="card list-group-item-action">
                    <div class="card-body">
                      <h5 class="card-title">Teacher 7</h5>
                      <p class="card-text">Rating: ★★</p>
                    </div>
                </a><a href="teacher.php?t=8" class="card list-group-item-action">
                    <div class="card-body">
                      <h5 class="card-title">Teacher 8</h5>
                      <p class="card-text">Rating: ★★★</p>
                    </div>
                </a><a href="teacher.php?t=9" class="card list-group-item-action">
                    <div class="card-body">
                      <h5 class="card-title">Teacher 9</h5>
                      <p class="card-text">Rating: ★★</p>
                    </div>
                </a><a href="teacher.php?t=10" class="card list-group-item-action">
                    <div class="card-body">
                      <h5 class="card-title">Teacher 10</h5>
                      <p class="card-text">Rating: ★</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="card-container">
           <div class="card-deck">
               <div class="card primary">
                   <h5 class="card-header bg-danger text-white" style="text-align:center">Last Visited Teachers</h5>
                   <div class="card-body">
                       <ul class="list-group">

                       </ul>
                   </div>
               </div>

               <div class="card">
                   <h5 class="card-header bg-success text-white" style="text-align:center">Most Visited / Popular Teacher</h5>
                   <div class="card-body">
                       <ul class="list-group">

                       </ul>
                   </div>
               </div>
           </div>
       </div>

    </body>
</html>

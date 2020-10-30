<?php
session_start();

function displayLastVisited(){
    $lastVisited = unserialize($_COOKIE['lastVisited']);
    foreach ($lastVisited as $key => $value) {
        echo '<li class="list-group-item d-flex justify-content-center">Teacher '.$value.'</li>';
    }
}

function displayMostVisited()
{
    $mostVisited = unserialize($_COOKIE['mostVisited']);
    $count = 0;
    foreach ($mostVisited as $key => $value) {
        echo <<<_END
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Teacher $key   	&nbsp &nbsp &nbsp  <span class="badge badge-secondary">$value</span>
                </li>
_END;
        $count += 1;
        if($count >= 5){
            break;
        }
    }
}
?>

<!DOCTYPE html>
<style>
    /* Bootstrap Reference */
    /* https://getbootstrap.com/docs/4.0/components/list-group/ */
    .card-container {
        padding: 30px 50px;
        /* background-color: red; */
        text-align: left;
    }
    .card {
        margin: 15px;
    }
</style>

<html>
    <head>
        <?php include_once 'reusable/head.php'; ?>
    </head>

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
           <div class="card-deck" style="width: 50%; margin:auto auto">
               <div class="card primary">
                   <h5 class="card-header bg-dark text-white" style="text-align:center">Last Visited Teachers</h5>
                   <div class="card-body">
                       <ul class="list-group">
                            <?php displayLastVisited(); ?>
                       </ul>
                   </div>
               </div>

               <div class="card">
                   <h5 class="card-header bg-dark text-white" style="text-align:center">Most Visited / Popular Teacher</h5>
                   <div class="card-body">
                       <ul class="list-group">
                           <?php displayMostVisited(); ?>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
    </body>
</html>

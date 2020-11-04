<?php
session_start();

$selected = $_GET['t'];
$mostVisited = array();
$lastVisited = array();

// Deal with most visited
if(isset($_COOKIE['mostVisited'])) {

    $mostVisited = unserialize($_COOKIE['mostVisited']);
    $freq = array_key_exists($selected, $mostVisited) ? $mostVisited[$selected] + 1 : 1;
    $mostVisited[$selected] = $freq;

    arsort($mostVisited);
}else{
    $mostVisited[$selected] = 1;
}



// Deal with last visited
if(isset($_COOKIE['lastVisited'])) {
    $lastVisited = unserialize($_COOKIE['lastVisited']);

    if (($index = array_search($selected, $lastVisited)) !== false) {
        unset($lastVisited[$index]);
        $lastVisited = array_values($lastVisited);
    }
    array_unshift($lastVisited, $selected);
    if(count($lastVisited) > 5){
        array_pop($lastVisited);
    }
}else{
    array_push($lastVisited, $selected);
}

setcookie( "lastVisited", serialize($lastVisited), time() + 3600); // expire in 1 hour
setcookie( "mostVisited", serialize($mostVisited), time() + 3600); // expire in 1 hour

?>
<!DOCTYPE html>
<html>
    <?php include_once 'reusable/head.php'; ?>

    <body>

        <!-- Page title -->
        <?php
            $title = 'Teacher';
            ob_start();
            include_once 'reusable/pageHeader.php';
            $output = ob_get_contents();
            $output = str_replace('Placeholder', $title, $output);
            ob_end_clean(); // Clear the buffer.
            echo $output; // Print everything.
         ?>

        <?php include_once 'reusable/nav.php'; ?>

        <style>
    .card-container {
        padding: 30px 50px;
    }
</style>

    <div class="card-container">
        <div class="card" style="width: 50%; margin:auto auto">
            <img class="card-img-top" src="../reusable/beethovon.png" alt="beethovon.png">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text" style="font-size: 20px;">
                    This is teacher Beethovon #<?php echo $_GET['t'] ?>
                    <br>
                </p>
                <a href="service.php" class="btn btn-dark">Back</a>
            </div>
        </div>
    </div>

    </body>
</html>

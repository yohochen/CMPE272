<?php
session_start();
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

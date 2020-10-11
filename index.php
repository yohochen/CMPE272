<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once 'reusable/head.php'; ?>
</head>


    <body>


    <!-- Page title -->
    <?php
        $title = 'Teach Me Piano!';
        ob_start();
        include('reusable/pageHeader.php');
        $output = ob_get_contents();
        $output = str_replace('Placeholder', $title, $output);
        ob_end_clean(); // Clear the buffer.
        echo $output; // Print everything.
     ?>



    <?php include_once 'reusable/nav.php'; ?>

    <!-- <?php echo print_r($_SESSION); ?> -->


    <p>Welcome to Teach Me Piano!!!</p>


    </body>
</html>

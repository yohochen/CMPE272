
<!DOCTYPE html>
<html>
<?php include_once 'reusable/head.php'; ?>
<?php
// session_start();
?>

    <body>


    <!-- Page title -->
    <?php
        $title = 'Teach Me Piano!';
        ob_start();
        include_once 'reusable/pageHeader.php';
        $output = ob_get_contents();
        $output = str_replace('Placeholder', $title, $output);
        ob_end_clean(); // Clear the buffer.
        echo $output; // Print everything.
     ?>



    <?php include_once 'reusable/nav.php'; ?>



    <p>Welcome to Teach Me Piano!!!</p>




    </body>
</html>

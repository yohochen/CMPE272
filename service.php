<?php
session_start();
?>
<!DOCTYPE html>
<html>
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

        <p>Service, coming soon!</p>



    </body>
</html>

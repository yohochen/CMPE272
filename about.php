<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <?php include_once 'reusable/head.php'; ?>
    <body>

        <!-- Page title -->
        <?php
            $title = 'About';
            ob_start();
            include 'reusable/pageHeader.php';
            $output = ob_get_contents();
            $output = str_replace('Placeholder', $title, $output);
            ob_end_clean(); // Clear the buffer.
            echo $output; // Print everything.
         ?>

        <?php include_once 'reusable/nav.php'; ?>

        <p>In Teach Me Piano, We Provide a Service to Match Piano Learners with the Best Tutor They Need!</p>



    </body>
</html>

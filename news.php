<!DOCTYPE html>
<html>
    <?php include_once 'reusable/head.php'; ?>

    <body>

        <!-- Page title -->
        <?php
            $title = 'News';
            ob_start();
            include_once 'reusable/pageHeader.php';
            $output = ob_get_contents();
            $output = str_replace('Placeholder', $title, $output);
            ob_end_clean(); // Clear the buffer.
            echo $output; // Print everything.
         ?>

        <?php include_once 'reusable/nav.php'; ?>

        <p>Welcome our new teacher, Gin Lee! - 9/29/2020</p>
        <p>Our in-person tutoring service will restart as early as 12/1/2020 - 10/1/2020</p>



    </body>
</html>

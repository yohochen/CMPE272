<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php include_once 'reusable/head.php'; ?>

    <!-- Preprocess text file to get contacts info -->
    <?php
        $persons = [];
        $file = fopen("contacts.txt", "r") or die("Unable to open file!");
        while(!feof($file)) {
            $line = fgets($file);
            if(strlen($line) != 0){
                $persons[] = $line;
            }
        }
        fclose($file);
    ?>

    <body>
        <!-- Page title -->
        <?php
            $title = 'Contacts';
            ob_start();
            include 'reusable/pageHeader.php';
            $output = ob_get_contents();
            $output = str_replace('Placeholder', $title, $output);
            ob_end_clean(); // Clear the buffer.
            echo $output; // Print everything.
         ?>

        <?php include_once 'reusable/nav.php'; ?>

        <?php
            $queries = array();
            parse_str($_SERVER['QUERY_STRING'], $queries);
            $_SESSION['id'] = chop($queries['v']);

            echo "
            <script type='text/javascript'>
            
                changeValue()
                function changeValue()
                {
                    document.getElementById('logButton').value = ".$_SESSION['id']."
                }

            </script> ";



            if (strlen($_SESSION['id']) <= 0) {
                echo "Please login to see the list of User";
            } else{
                echo "
                <div class='table'>
                    <table >
                        <tr>
                            <th>Name</th>
                            <th>Phone #</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                        ";
                    // <!-- Iterate all the persons rows, and for each row, parse each column into table -->
                     foreach ($persons as $person):
                         $columns = explode(",", $person);
                         echo "
                            <tr>
                                <td>". $columns[0] ."</td>".
                                "<td>". $columns[1]."</td>".
                                "<td>". $columns[2]."</td>".
                                "<td>". $columns[3]."</td>
                            </tr>"
                            ;
                    endforeach;
                    echo "
                    </table>
                </div>
                ";
            }
        ?>




    </body>
</html>

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
        <h1>Contacts</h1>

        <?php include_once 'reusable/nav.php'; ?>

        <div class="table">
            <table >
                <tr>
                    <th>Name</th>
                    <th>Phone #</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>

            <!-- Iterate all the persons rows, and for each row, parse each column into table -->
            <?php foreach ($persons as $person): ?>
                <?php $columns = explode(",", $person) ?>
                <tr>
                    <td><?php echo $columns[0]; ?></td>
                    <td><?php echo $columns[1]; ?></td>
                    <td><?php echo $columns[2]; ?></td>
                    <td><?php echo $columns[3]; ?></td>
                </tr>
            <?php endforeach; ?>

            </table>
        </div>


    </body>
</html>

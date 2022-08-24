<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" onsubmit="return ValidateDate()">
        <table>
            <tr>
                <td>
                    File code
                </td>
                <td>
                    <input type="text" name="filecode" id="code">
                </td>
            </tr>
            <tr>
                <td>
                    Search By
                </td>
                <td>
                    <select name="type" id="">
                        <option value="filecode"></option>
                        <option value="year"></option>
                        <option value="filecode"></option>
                    </select>
                </td>
            </tr>
            <input type="submit" name="submit" value="Enter Data">
            <input type="reset" name="reset" value="Clear Data">
        </table>
    </form>
</body>
</html>

<?php

    include("connection.php");

    if(isset($_POST['submit'])){

        $type = $_POST['type'];
        $filecode = $_POST['filecode'];
        $query = "SELECT `id`, `filecode`, `filename`, `constructionlicense`, `occupancy`, `elink` FROM `data` WHERE '$type' = '$filecode'";

        $res = mysqli_query($conn,$query);
        
        ?> <table>
            <tr>
                <td>File Code</td>
                <td>File Name</td>
                <td>Construction License</td>
                <td>Occupancy</td>
                <td>e-Link</td>
            </tr>
            <?php
                foreach($res as $record){
                    ?>
                    <tr>
                        <td><?php echo $record['filecode'] ?></td>
                        <td><?php echo $record['filename'] ?></td>
                        <td><?php echo $record['constructionlicense'] ?></td>
                        <td><?php echo $record['occupancy'] ?></td>
                        <td><?php echo $record['elink'] ?></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
        <?php
    }
?>
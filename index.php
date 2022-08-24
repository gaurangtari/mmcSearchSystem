<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" onsubmit="return ValidateData()">
        <table>
            <tr>
                <td>
                    File code
                </td>
                <td>
                    <input type="text" maxlength="10"name="filecode" id="code">
                </td>
            </tr>
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <input type="text" name="filename" id="name">
                </td>
            </tr>
            <tr>
                <td>
                    Construction License Issue Date
                </td>
                <td>
                    <input type="date" maxlength="10" name="constructionlicense" id="consl">
                </td>
            </tr>
            <tr>
                <td>
                    Occupancy
                </td>
                <td>
                    <label>No.</label>
                    <input type="text" size="1" maxlength="1" name="occ1" id="occ1">
                    <label> (OC) </label>
                    <input type="text" size="1" maxlength="1" name="occ2" id="occ2">
                    <label>/</label>
                    <input type="text" size="5" maxlength="5" name="occ3" id="occ3">
                    <label>/TECH/</label>
                    <input type="text" size="2" maxlength="2" name="occ4" id="occ4">
                </td>
            </tr>
            <tr>
                <td>
                    Year
                </td>
                <td>
                    <input type="text" name="year" id="year">
                </td>
            </tr>
            <tr>
            <tr>
                <td>
                    Renewal License
                </td>
                <td>
                    <input type="date" name="renewallicense" id="renew">
                </td>
            </tr>
            <tr>
                <td>
                    Revise
                </td>
                <td>
                    <input type="date" name="revise" id="revise">
                </td>
            </tr>
            <tr>
                <td>
                    Sanad Copy
                </td>
                <td>
                    <label for="sanadyes">Available</label>
                    <input type="radio" name="sanad" value="yes" id="sanadyes">
                    <label for="sanadno">Not Available</label>
                    <input type="radio" name="sanad" value="no" id="sanadno">
                </td>
            </tr>
            <tr>
                <td>
                    e-Link
                </td>
                <td>
                    <input type="text" name="elink" id="link">
                </td>
            </tr>
                <td>
                <input type="submit" name="submit" value="Enter Data">
                </td>
                <td>
                <input type="reset" name="reset" value="Clear Data">
                </td>
            </tr>
        </table>
        
            
    </form>
</body>
</html>

<script type="text/javascript">

function ValidateData(){
    var license = document.getElementById('code').value;
    var year = document.getElementById('year').value;
    var name = document.getElementbyId('name').value;

    if(!license.match(/^A\/[0-9]{0-3}\/[0-9]{2}-[0-9]{2}$/)){
        alert("Invalid License Code")
        return false;
    }
    if(!year.match(/^[0-9]{2}-[0-9]{2}$/)){
        alert("Invalid Year")
        return false;
    }
    if(!name.match(/^\w+$/)){
        alert("Invalid Name")
        return false;
    }
    return true;
}

</script>


<?php

    include("connection.php");

    if(isset($_POST['submit'])){

        $filecode = $_POST['filecode'];
        $filename = $_POST['filename'];
        $constructionlicense = $_POST['constructionlicense'];
        $occupancy = $_POST['occupancy'];
        $elink = $_POST['elink'];
        $year = $_POST['year'];
        $renewallicense = $_POST['renewallicense'];
        $revise = $_POST['revise'];
        $sanad = ['sanad'];

        $query1 = "INSERT INTO `data`(`filecode`, `filename`, `constructionlicense`, `occupancy`, `elink`) VALUES ('$filecode','$filename','$constructionlicense','$occupancy','$elink')";
        $query2 = "INSERT INTO `storage`(`filecode`, `cupboard`, `shelf`) VALUES ('$filecode','$year')";

        $res1 = mysqli_query($conn,$query1);
        $res2= mysqli_query($conn,$query2);

        if($res and $res2){
            echo "data entered";
        }
        else{
            echo "error";
        }
    }
?>

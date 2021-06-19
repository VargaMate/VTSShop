<!DOCTYPE html>
<html>
<head>
    <title>VTS Shop</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<nav>
    <ul class="menu">
        <li><a href="../AboutUs.php">Rólunk</a></li>
        <li><a href="../Contact.php">Elérhetőségek</a></li>

        <li><a href="../Shop.php">Termékek</a></li>
        <li><a href="../admin/Admin.php">Admin</a></li>

    </ul>
    <li><a href="../MyCart.php"><img src="../mycart.jpg" width="30px" id="mycart"></a></li>
</nav>

<br>
<form method="post" style="margin: 10px; border: #2fa1d6 solid 2px;width: 500px; padding: 10px">

    <label for="name" style="font-size: 18px;color: #2fa1d6;font-family: 'open sans', Arial, sans-serif">Termék Neve:</label>
    <input type="text" placeholder="Termék név" id="name"  name="name" style="margin: 10px;
                                                                      border: #2fa1d6 solid 2px;
                                                                      padding: 5px;
                                                                                ">
    <br>
    <label for="price" style="font-size: 18px;color: #2fa1d6;font-family: 'open sans', Arial, sans-serif">Termék ára:</label>
    <input type="text" placeholder="Termék ára" id="price" name="price" style="margin: 10px;
                                                                    border: #2fa1d6 solid 2px;
                                                                    padding: 5px;
                                                                                ">
    <br>
    <label for="kep" style="font-size: 18px;color: #2fa1d6;font-family: 'open sans', Arial, sans-serif">Kép neve:</label>
    <input type="text" placeholder="Kép" id="kep" name="kep" style="margin: 10px;
                                                                    border: #2fa1d6 solid 2px;
                                                                    padding: 5px;
                                                                                ">
    <br>
    <input type="submit" name="submit" style="
                    color: #2fa1d6;
                    font-family: 'open sans', Arial, sans-serif;
                    font-size: 15px;
                    padding: 5px;
                    margin-left: 55px;
                    border: #2fa1d6 solid 2px;
                    background-color: #fff;
                    cursor: pointer;
                          ">


</form>
<br>

<?php
require_once '../df_config.php';
$db = new mysqli(HOST,USER,PASS,DATABASE) or die(mysqli_error($db));

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $kep = $_POST['kep'];

    $db->query("INSERT INTO termékek (Termek_Neve,Termek_Ara,Kep) VALUES ('$name','$price','$kep')")
    or die($db->error);

}

?>
<form method="get">
    <table style="border: #2fa1d6 solid 2px; width: 1200px; margin-left: 10px">
        <tr >
            <th style="border-bottom: #2fa1d6 solid 2px">Termék Azonosító</th>
            <th style="border-bottom: #2fa1d6 solid 2px">Termék Neve</th>
            <th style="border-bottom: #2fa1d6 solid 2px">Termék Ára</th>
            <th style="border-bottom: #2fa1d6 solid 2px">Kep</th>
            <th style="border-bottom: #2fa1d6 solid 2px">Upload</th>
            <th style="border-bottom: #2fa1d6 solid 2px">Delete</th>
        </tr>
        <?php

        if ($result = $db->query("SELECT * FROM Termékek")) {
            while ($row = $result->fetch_assoc()) {

                echo "<tr style='text-align: center;font-size: 25px'><td>" . $row['Termek_Azon'] . "</td>
                          <td>" . $row['Termek_Neve'] . "</td>
                          <td>" . $row['Termek_Ara'] . "</td>
                          <td><img width='100' 
                                   style='border: solid 2px #000000;'
                                   height='150' 
                                   src=" . $row['Kep'] . "></td>
                                   
                          <td><a href='Edit.php?Upload=".$row['Termek_Azon']."'  style='
                          padding: 5px;
                          border: #2fa1d6 solid 2px;
                          background-color: #fff;
                          cursor: pointer;
                          color: #2fa1d6;
                          font-size: 15px;
                          '>Upload</a></td>
                          
                          <td><a href='Edit.php?Delete=".$row['Termek_Azon']."'  style='
                          padding: 5px;
                          border: #2fa1d6 solid 2px;
                          background-color: #fff;
                          cursor: pointer;
                          color: #2fa1d6;
                          font-size: 15px;
                          '>Delete</a></td>
                                   </tr>";
            }
        }

        ?>
    </table>
</form>

</body>


</html>
<!DOCTYPE html>
<html>
<head>
    <title>VTS Shop</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<nav>
    <ul class="menu">
        <li><a href="AboutUs.php">Rólunk</a></li>
        <li><a href="Contact.php">Elérhetőségek</a></li>

        <li><a href="Shop.php">Termékek</a></li>
        <li><a href="admin/Admin.php">Admin</a></li>

    </ul>
    <li><a href="MyCart.php"><img src="mycart.jpg" width="30px" id="mycart"></a></li>
</nav>
<br>


<?php

echo'<div id="search-bar" style="
                                 margin-left: 100px;
                                 padding: 5px"> 
     <form method="get">                           
<input name="search" type="text" placeholder="search" style="padding: 5px">

<button style="
                margin-left: 10px;
                padding: 5px;
                color: #2fa1d6;
                background-color: white;
                border: #2fa1d6 solid 1px;
                
                ">Search</button></form> </div>';

echo '<br>';

require_once 'df_config.php';
$db = new mysqli(HOST,USER,PASS,DATABASE) or die(mysqli_error($db));

if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    if ($result = $db->query("SELECT * FROM Termékek WHERE Termek_neve LIKE '%$search%'")) {
        $searched = $db->affected_rows;
        while ($row = $result->fetch_assoc()) {

                echo '<div class="product">
                <div><img width="200" style="border: solid 2px #000000;" height="300" src=' . $row['Kep'] . '>
                <span style="margin-left: 60px;
                             font-family: Georgia ; 
                             color:rgba(0,0,0,0.7);
                             font-size: 15px;
                             font-weight: bold">
                             ' . $row['Termek_Neve'] . '</span>
                             
                <span style="font-family: Georgia;
                             color:rgba(0,0,0,0.7);
                             font-size: 15px;
                             font-weight: bold">
                             : ' .$row['Termek_Ara'] . '</span></div></div>';
            }
        }
        if ($searched == 0) {
            echo "Nem talalhato ilyen elem.";
        }

}
elseif(empty($_GET['search'])){
    if ($result = $db->query("SELECT * FROM Termékek")) {
        while ($row = $result->fetch_assoc()) {

                echo '<div class="product">
                <div><img width="200" style="border: solid 2px #000000;" height="300" src=' . $row['Kep'] . '>
                <span style="margin-left: 60px;
                             font-family: Georgia ; 
                             color:rgba(0,0,0,0.7);
                             font-size: 15px;
                             font-weight: bold">
                             ' . $row['Termek_Neve'] . '</span>
                             
                <span style="font-family: Georgia;
                             color:rgba(0,0,0,0.7);
                             font-size: 15px;
                             font-weight: bold">
                             : ' . $row['Termek_Ara'] . '</span></div></div>';
            }
        }

}


?>
</body>
</html>
<?php

require_once '../df_config.php';
$db = new mysqli(HOST,USER,PASS,DATABASE) or die(mysqli_error($db));


if(isset($_GET['Delete'])){
    $id=$_GET['Delete'];
    $db -> query("DELETE FROM termékek WHERE Termek_Azon=$id") or die($db->error());
    header("location: Admin.php");
}


if(isset($_GET['Upload'])){
    $id=$_GET['Upload'];
    $result = $db -> query("SELECT * FROM termékek WHERE Termek_Azon=$id") or die($db->error());


        while ($row = $result->fetch_assoc()) {

            echo "<form method='post' style='margin: 10px; border: #2fa1d6 solid 2px;width: 500px; padding: 10px'>
<label for='name' style='font-size: 18px;
                                       color: #2fa1d6;'>
                                       Termék Neve:</label>
    <input type='text' placeholder='Termék név' id='name' value=" . $row['Termek_Neve'] . " name='name' 
                                                                      style='margin: 10px;
                                                                      border: #2fa1d6 solid 2px;
                                                                      padding: 5px;'>
                                  <br>                                      
                  <label for='price' style='font-size: 18px;
                                    color: #2fa1d6;'>
                                    Termék Ára:</label>
    <input type='text' placeholder='Termék Ára' id='price' value=" . $row['Termek_Ara'] . " name='price' 
                                                               style='margin: 10px;
                                                                      border: #2fa1d6 solid 2px;
                                                                      padding: 5px;'>
                                   <br>                                             
                  <label for='kep' style='font-size: 18px;
                                           color: #2fa1d6;'>
                                           Termék Képe:</label>
    <input type='text' placeholder='Termék Képe' id='kep' value=" . $row['Kep'] . " name='kep'
                                                                      style='margin: 10px;
                                                                      border: #2fa1d6 solid 2px;
                                                                      padding: 5px;'>        
                                   <br>                                                      
    <input type='submit' name='submit' style='
                    color: #2fa1d6;
                    font-size: 15px;
                    padding: 5px;
                    margin-left: 55px;
                    border: #2fa1d6 solid 2px;
                    background-color: #fff;
                    cursor: pointer;
                          '>      </form>    
                                                                
                                                                                ";
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $kep = $_POST['kep'];
                $db->query("UPDATE termékek SET Termek_Neve='$name', Termek_Ara='$price', Kep='$kep' WHERE Termek_Azon=$id");
                header("location:Admin.php");
            }
        }

}




?>
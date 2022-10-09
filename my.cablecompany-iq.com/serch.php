<?php
include 'dbConnection.php';
$nameC = $_POST['id'];
$sql = "SELECT sellPrice from productvalues WHERE id IN( SELECT productvalues_id FROM productfullinfo
 WHERE productsnames_id =".$nameC.")";
  $return = mysqli_query($connerct, $sql);
while($row = mysqli_fetch_assoc($return)){
    echo $row["sellPrice"];
}
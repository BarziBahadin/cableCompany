<?php
session_start();

if(!isset($_SESSION["logIn"])){
header("Location: login.html");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Berlin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" href="logo1.jpg" type="image/png" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ec20a1df57.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" href="logo1.jpg" type="image/png" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ec20a1df57.js" crossorigin="anonymous"></script>
    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet"> -->

</head>
<style>
    body {
        height: 100vh;
        background: linear-gradient(to right top, #65dfc9, #ee1deb);
    }
    .container{
        background: rgba(255,255,255,0.21);
        border-radius: 1em;

    }
</style>
<script>
    function arithmatic() {
        var draw = document.getElementById("meter").value;
        var sell = document.getElementById("price").value;
        var price = Number(sell) * Number(draw);
        document.getElementById("total").value = price;
    }

    function arithmatic1() {
        var price = document.getElementById("aPrice").value;
        var intrust = document.getElementById("interest").value;
        intrust = intrust / 100;
        price = (Number(price) * intrust) + Number(price);
        document.getElementById("sellP").value = price;
    }
</script>
<?php
include 'dbConnection.php';

if (isset($_GET['case'])) {
    $case = $_GET['case'];
} else {
    $case = 0;
}
$url = "";
if (isset($_GET['id'])) {
    $url = "?id=" . $_GET['id'];
}
?>

<body>
    <br>
    <h2 class="h2 text-center">edit</h2>
    <br><br><br>

    <div class="container shadow-lg p-2" >
        <form method="POST" action="dbm.php<?php echo $url; ?>" class="row g-3">
            <?php

            switch ($case) {
                case 1:
                    if (isset($_GET['edit_id'])) {
                        $sql = "SELECT * FROM `accountsell` where id=" . $_GET["edit_id"];

                        $rs = mysqli_query($connerct, $sql); // running sq
                        while ($row = mysqli_fetch_assoc($rs)) {
                            echo '<div class="col-md-6">
                
                            <label for="inputEmail4" class="form-label">cable name</label>
                            
                            <input type="text" class="form-control" name="name" id="inputEmail4" value="' . $row["cableName"] . '"> 
                            <label for="inputEmail5" class="form-label">note</label>
                <input type="text" class="form-control" name="note" id="inputEmail5" value="' . $row["note"] . '"> </div>';
            
            ?><div class="col-md-2">
                                <label for="inputPassword4" class="form-label">meter</label>
                                <input type="text" class="form-control" name="meter" id="meter" onkeyup="arithmatic();" value="<?php echo number_format($row["meter"], 2, '.', ''); ?> ">
                            
                            </div>
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">price per meter</label>
                                <input type="text" class="form-control" name="perMeter" id="price" onkeyup="arithmatic();" value="<?php echo number_format($row["pricePerMeter"], 2, '.', '') ?> ">
                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="case" aria-label="Sell Price" value="9">
                                <input type="hidden" name="id" aria-label="Sell Price" value=<?php echo $_GET["edit_id"] ?>>
                               
                                <label for="inputPassword4" class="form-label">total</label><input type="text" name="total" class="form-control" id="total" value="<?php echo number_format($row["total"], 2, '.', '') ?> ">
                            </div>
                        <?php }
                    } else {
                        exit('No ID specified!');
                    }
                    mysqli_close($connerct);
                    break;
                case 2:
                    if (isset($_GET['edit_id'])) {
                        $sql = "SELECT * FROM `accountsell1` where id=" . $_GET["edit_id"];
                        $rs = mysqli_query($connerct, $sql); // running sq
                        while ($row = mysqli_fetch_assoc($rs)) {
                            echo '<div class="col-md-6">
                
                            <label for="inputEmail4" class="form-label">cable name</label>
                            
                            <input type="text" class="form-control" name="name" id="inputEmail4" value="' . $row["cableName"] . '"> 
                            <label for="inputEmail5" class="form-label">note</label>
                <input type="text" class="form-control" name="note" id="inputEmail5" value="' . $row["note"] . '"> </div>';
            
            ?><div class="col-md-2">
                                <label for="inputPassword4" class="form-label">meter</label>
                                <input type="text" class="form-control" name="meter" id="meter" onkeyup="arithmatic();" value="<?php echo number_format($row["meter"], 2, '.', ''); ?> ">
                            </div>
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">price per meter</label>
                                <input type="text" class="form-control" name="perMeter" id="price" onkeyup="arithmatic();" value="<?php echo number_format($row["pricePerMeter"], 2, '.', '') ?> ">
                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="case" aria-label="Sell Price" value="10">
                                <input type="hidden" name="id" aria-label="Sell Price" value=<?php echo $_GET["edit_id"] ?>>
                                <label for="inputPassword4" class="form-label">total</label><input type="text" name="total" class="form-control" id="total" value="<?php echo number_format($row["total"], 2, '.', '') ?> ">
                            </div>
                        <?php }
                    } else {
                        exit('No ID specified!');
                    }
                    mysqli_close($connerct);
                    break;
                case 3:
                    if (isset($_GET['edit_id'])) {
                        $sql = "SELECT * FROM `productfullinfo` where id=" . $_GET["edit_id"];
                        $rs = mysqli_query($connerct, $sql); // running sq
                        $ids = mysqli_fetch_assoc($rs);
                        $sql = "SELECT `cabelName` FROM `productsnames` where id= " . $ids["productsnames_id"];
                        $result = mysqli_query($connerct, $sql); // runing sql0
                        $name = mysqli_fetch_array($result); // geting the name 
                        $sql = "SELECT actualPrice, interest, sellPrice FROM `productvalues` where id=" .  $ids["productvalues_id"];
                        $result = mysqli_query($connerct, $sql); // runing sql
                        $values = mysqli_fetch_assoc($result); // geing back the valurs like the date of the tings 
                        echo '<div class="col-md-4">
                        
                    <label for="inputEmail4" class="form-label">cable name</label>
                        
                        <input type="text" class="form-control" name="name" id="inputEmail4" value="' . $name[0] . '"> </div>';
                        ?><div class="col-md-2">
                            <label for="inputPassword4" class="form-label">actual prise</label>
                            <input type="text" class="form-control" name="aPrice" id="aPrice" onkeyup="arithmatic1();" value="<?php echo number_format($values["actualPrice"], 2, '.', ''); ?> ">
                        </div>
                        <div class="col-md-2">
                            <label for="inputPassword4" class="form-label">interest</label>
                            <input type="text" class="form-control" name="interest" id="interest" onkeyup="arithmatic1();" value="<?php echo number_format($values["interest"], 2, '.', ''); ?> ">
                        </div>
                        <div class="col-md-2">
                            <label for="inputEmail4" class="form-label">sell price</label>
                            <input type="text" class="form-control" name="sellP" id="sellP" value="<?php echo number_format($values["sellPrice"], 2, '.', '') ?> ">
                        </div>

                        <div class="col-md-2">
                            <label for="inputEmail4" class="form-label">stoke</label>
                            <input type="text" class="form-control" name="inStoce" id="price" value="<?php echo number_format($ids["inStoce"], 2, '.', '') ?> ">
                        </div>
                        <input type="hidden" name="case" aria-label="Sell Price" value="15">
                        <input type="hidden" name="id" aria-label="Sell Price" value=<?php echo $_GET["edit_id"] ?>>
                        <input type="hidden" name="idName" aria-label="Sell Price" value=<?php echo $ids["productsnames_id"] ?>>
                        <input type="hidden" name="idValue" aria-label="Sell Price" value=<?php echo $ids["productvalues_id"] ?>>
                        <?php
                    } else {
                        exit('No ID specified!');
                    }
                    mysqli_close($connerct);
                    break;

                default:
                    if (isset($_GET['edit_id'])) {
                        $sql = "SELECT * FROM `berlin` where id=" . $_GET["edit_id"];
                        $rs = mysqli_query($connerct, $sql); // running sq
                        while ($row = mysqli_fetch_assoc($rs)) {
                            echo '<div class="col-md-3">
                
            <label for="inputEmail4" class="form-label">cable name</label>
                
                <input type="text" class="form-control" name="name" id="inputEmail4" value="' . $row["cabelName"] . '"> </div>';
                        ?><div class="col-md-3">
                                <label for="inputPassword4" class="form-label">meter</label>
                                <input type="text" class="form-control" name="meter" id="meter" onkeyup="arithmatic();" value="<?php echo number_format($row["meters"], 2, '.', '') ?> ">
                            </div>
                            <div class="col-md-3">
                                <label for="inputEmail4" class="form-label">price per meter</label>
                                <input type="text" class="form-control" name="perMeter" id="price" onkeyup="arithmatic();" value="<?php echo number_format($row["pricePerMeter"], 2, '.', '') ?> ">
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" name="case" aria-label="Sell Price" value="8">
                                <input type="hidden" name="id" aria-label="Sell Price" value=<?php echo $_GET["edit_id"] ?>>
                                <label for="inputPassword4" class="form-label">total</label><input type="text" name="total" class="form-control" id="total" value="<?php echo number_format($row["priceInTotal"], 2, '.', '') ?> ">
                            </div>
            <?php }
                    } else {
                        exit('No ID specified!');
                    }
                    mysqli_close($connerct);
                    break;
            }

            ?>
            <center>
                <button type="submit" class="btn btn-primary col-sm-1">update</button>
                <button type="button" onclick="    window.history.back();" class="btn btn-danger col-sm-1"><a style="text-decoration: none; color : rgb(255,255,255)">cancel</a></button>
            </center>
        </form>
    </div>
</body>

</html>
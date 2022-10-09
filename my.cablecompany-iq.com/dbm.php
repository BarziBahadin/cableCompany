<?php
include 'dbConnection.php';
if (isset($_GET['case'])) {
    $case = $_GET['case'];
} else {
    $case = $_POST["case"];
}
if (isset($_GET['cId'])) {
    $cId = $_GET['cId'];
}
switch ($case) {
    case 1:
        $cableName = $_POST['name'];
        $sql1 = "SELECT id FROM productsnames WHERE cabelName ='" . $cableName . "';"; // getting the id from table productsnames
        $result = mysqli_query($connerct, $sql1); // runing sql
        $row = mysqli_fetch_array($result); // returing value
        $sql2 = "INSERT INTO productvalues (`actualPrice`, `interest`, `sellPrice`) VALUES ( '" . $_POST['price'] . "' ,'" . $_POST['interest'] . "','" . $_POST["sellPrice"] . "');"; // inserting valoust to table of profuctvalues
        $result = mysqli_query($connerct, $sql2); // runing sql wedont net to get back anithing sine it is a insert statment
        $sql3 = "SELECT id FROM productvalues where actualPrice = '" . $_POST['price'] . "';"; // geting the id from table productvalues
        $result = mysqli_query($connerct, $sql3); // runing sql
        $row1 = mysqli_fetch_array($result); // returing value
        $sql = "INSERT INTO productfullinfo (`productsnames_id`, `productvalues_id`,`inStoce`) VALUES ('" . $row[0] . "','" . $row1[0] . "','" . $_POST["inStoce"] . "');"; // final save in the full info page 
        if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('New data has been inserted');
                window.location.href = 'home.php';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occured while inserting data');
            </script> <?php
                        echo mysqli_error($connerct);

                        echo $sql;
                    }
                    mysqli_close($connerct);
                    break;
                case 2:
                    $sql = "INSERT INTO `accountsell` (`customer_Id`, `cableName`, `meter`, `pricePerMeter`, `total`,`note`) VALUES (" . $_POST["id2"] .   ", '" . $_POST["name"] . "', " . $_POST['meter'] . "," . $_POST['price'] . "," . $_POST["total"] . ",'" . $_POST["note"] . "')";
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('a new Order has been added');
                window.location.href = 'fullInfo.php?cId=<?php echo $_GET['cId'] ?>';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while inserting data');
            </script> <?php
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                    mysqli_close($connerct);
                    break;
                case 3:
                    $sql = "INSERT INTO `customers` (`firstName`,
                         `lastName`, `phoneNumber`) 
                           VALUES ('" . $_POST['fn'] . "', '" . $_POST['sn'] . "' ,'" . $_POST['phn'] . "');";

                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('New data has been inserted');
                window.location.href = 'viewAccounts.php';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while inserting data');
            </script> <?php
                        echo mysqli_error($connerct);

                        echo $sql;
                    }
                    mysqli_close($connerct);
                    break;
                case 4:
                    $sql = "INSERT INTO `productsnames` (`cabelName`) VALUE ('" . $_POST['name'] . "')";
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('New data has been inserted');
                window.location.href = 'newItem.php';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while inserting data');
            </script> <?php
                        echo mysqli_error($connerct);

                        echo $sql;
                    }
                    mysqli_close($connerct);

                    break; //chek out
                case 5:
                    $name = explode(" ", $_POST["name"]);

                    $sql = "SELECT id FROM customers where firstName like '" . $name[0] . "'";

                    $result = mysqli_query($connerct, $sql); // runing sql
                    $custumerId = mysqli_fetch_array($result);
                    $id = explode(" ", $_POST["product"]);

                    $sql1 = "SELECT * FROM productfullinfo WHERE productsnames_id =" . $id[0];

                    $result1 = mysqli_query($connerct, $sql1); // runing sql
                    $productId = mysqli_fetch_array($result1);
                    $inStoke = $productId[3] - $_POST["meter"];
                    if (!empty($_POST['stoke'])) {
                        $sql3 = "UPDATE `productfullinfo` SET `inStoce` =" . $inStoke . " WHERE `productfullinfo`.`id` =" . $productId[0];
                        mysqli_query($connerct, $sql3);
                    }
                    if ($_POST["note"] == null) {
                        $sql4 = "INSERT INTO `accountsell` (`customer_Id`, `cableName`, `meter`, `pricePerMeter`, `total`) VALUES (" . $custumerId[0] . ", '" . substr($_POST["product"], 2) . "', " . $_POST['meter'] . "," . $_POST['pricePerMeter'] . "," . $_POST["total"] . " )";
                        $sql2 = "INSERT INTO `temp` (`customer_Id`, `productfullinfo_Id`,`nrxikotai`, `total`, `payed`, `haveToPay`) VALUES (" . $custumerId[0] . ", " . $productId[0] . ", " . $_POST["pricePerMeter"] . ", " . $_POST["total"] . ", " . $_POST["payed"] . "," . $_POST["remaining"] . ");";
                    } else {
                        $sql4 = "INSERT INTO `accountsell` (`customer_Id`, `cableName`, `meter`, `pricePerMeter`, `total`) VALUES (" . $custumerId[0] . ", " . $cabelName . ", " . $_POST['meter'] . "," . $_POST['pricePerMeter'] . "," . $_POST["total"] . " )";
                        $sql2 = "INSERT INTO `temp` (`customer_Id`, `productfullinfo_Id`, `total`, `payed`, `haveToPay`, `note`) VALUES (" . $custumerId[0] . ", " . $productId[0] . ", " . $_POST["pricePerMeter"] . ", " . $_POST["total"] . ", " . $_POST["payed"] . "," . $_POST["remaining"] . ",'" . $_POST["note"] . "');";
                    }
                    if (mysqli_query($connerct, $sql2) && mysqli_query($connerct, $sql4)) { ?>
            <script type="text/javascript">
                alert('New data has been inserted');
                window.location.href = 'home.php';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while inserting data');
            </script> <?php
                        echo mysqli_error($connerct);
                    }
                    mysqli_close($connerct);
                    break;
                case 6:
                    $sql = "INSERT INTO `berlin` (`idFileName`,`cabelName`, `meters`, `pricePerMeter`, `priceInTotal`) VALUES (" . $_POST["idFile"] . ",'" . $_POST['cn'] . "'," . $_POST['meter'] . "," . $_POST['price'] . "," . $_POST['total'] . ")";
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
               
                window.location.href = 'berlin.php?id=<?php echo $_POST["idFile"] ?>';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while inserting data');
            </script> <?php
                        echo mysqli_error($connerct);

                        echo $sql;
                    }
                    mysqli_close($connerct);

                    break;
                case 7:
                    if (isset($_POST['phone'])) {
                        $sql = "UPDATE `customers` SET `firstName` = '" . $_POST['first_name'] . "', `lastName` = '" . $_POST['last_name'] . "', `phoneNumber` =" . $_POST['phone'] . " WHERE `id` =" . $_POST['id1'];
                    } else {
                        $sql = "UPDATE `customers` SET `firstName` = '" . $_POST['first_name'] . "', `lastName` = '" . $_POST['last_name'] . "' WHERE `id` =" . $_POST['id1'];
                    }
                    if (mysqli_query($connerct, $sql)) {
                        ?>
            <script type="text/javascript">
                alert('update is done');
                window.location.href = 'viewAccounts.php';
            </script><?php
                    } else {
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                    break;
                case 8:
                    $sql = "UPDATE `berlin` SET `cabelName` ='" . $_POST["name"] . "', `meters` =" . $_POST["meter"] . " , `pricePerMeter` = " . $_POST["perMeter"] . ", `priceInTotal` = " . $_POST["total"] . " WHERE `berlin`.`id` =" . $_POST["id"];
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('update done berlin');
                window.location.href = 'berlin.php?id=<?php echo $_GET['id'] ?>';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while inserting data');
            </script> <?php
                        echo mysqli_error($connerct);
                        echo '<br>';
                        echo $sql;
                    }
                    mysqli_close($connerct);
                    break;
                    /**
                     * 
                     * inserting into hatu and roishtu 
                     * case 9 is roshtu 
                     * case 10 is hatu
                     * 
                     *  */
                case 9:
                    // $sql = "UPDATE `berlin` SET `cabelName` ='" . $_POST["name"] . "', `meters` =" . $_POST["meter"] . " , `pricePerMeter` = " . $_POST["perMeter"] . ", `priceInTotal` = " . $_POST["total"] . " WHERE `berlin`.`id` =" . $_POST["id"];
                    $sql = "UPDATE `accountsell` SET `cableName` = '" . $_POST["name"] . "', `meter` = " . $_POST['meter'] . ", `pricePerMeter` =" . $_POST['perMeter'] . " , `total` = " . $_POST["total"] . ", `note`='" . $_POST["note"] . "' WHERE `accountsell`.`id` =" . $_POST["id"];
                    // $sql = "INSERT INTO `accountsell` (`customer_Id`, `cableName`, `meter`, `pricePerMeter`, `total`,`note`) VALUES (" . $_POST["id2"].   ", '" . $_POST["name"] . "', " . $_POST['meter'] . "," . $_POST['price'] . "," . $_POST["total"] . ",'". $_POST["note"]."')";
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('update done order');
                window.location.href = 'fullInfo.php?cId=<?php echo $_GET['id'] ?>';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while inserting data');
            </script> <?php
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                    mysqli_close($connerct);
                    break;
                case 10:
                    $sql = "UPDATE `accountsell1` SET `cableName` = '" . $_POST["name"] . "', `meter` = " . $_POST['meter'] . ", `pricePerMeter` =" . $_POST['perMeter'] . " , `total` = " . $_POST["total"] . ",`note`='" . $_POST["note"] . "' WHERE `accountsell1`.`id` =" . $_POST["id"];
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('update done receive');
                window.location.href = 'fullInfo.php?cId=<?php echo $_GET['id'] ?>';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while inserting data');
            </script> <?php
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                    mysqli_close($connerct);
                    break;
                    /**
                     * 
                     * creating file names 
                     * 
                     */
                case 11:
                    if (isset($_POST["phn"])) {
                        $sql = "INSERT INTO `filename` (`fileName`,`PhoneNumber`,`date`) values ('" . $_POST["fn"] . "','" . $_POST["phn"] . "','" . $_POST["year"] . "-" . $_POST["month"] . "-1')";
                    } else {
                        $sql = "INSERT INTO  `filename` (`fileName`,`date`) values ('" . $_POST["fn"] . "', '" . $_POST["year"] . "-" . $_POST["month"] . "-1')";
                    }
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('new file has been added');
                window.location.href = 'fileViewBerlin.php?month=<?php echo $_POST['month']; ?>&year=<?php echo $_POST['year']; ?>';
            </script>
            
            <?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while crating new file');
            </script> <?php
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                    echo $sql;
                    mysqli_close($connerct);
                    break;
                case 12:
                    $sql = "INSERT INTO `accountsell1` (`customer_Id`, `cableName`, `meter`, `pricePerMeter`, `total`,`note`) VALUES (" . $_POST["id3"] . ", '" . $_POST["name"] . "', " . $_POST['meter'] . "," . $_POST['price'] . "," . $_POST["total"] . ",'" . $_POST["note"] . "')";
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('add done hatu');
                window.location.href = 'fullInfo.php?cId=<?php echo $_GET['cId'] ?>';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while inserting data');
            </script> <?php
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                    mysqli_close($connerct);
                    break;
                case 13:
                    $sql = "UPDATE `filename` SET `fileName` = '" . $_POST['fn'] . "' , `date` = '2021-" . $_POST["month"] . "-1' WHERE `filename`.`id` =" . $_GET['fid'];
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('your file has been renamed ');
                window.location.href = 'fileViewBerlin.php?month=<?php echo $_GET['month']; ?>&year=<?php echo $_GET['year']?>';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while crating new file');
            </script> <?php
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                    echo $sql;
                    mysqli_close($connerct);
                    break;
                case 14:
                    if (($_POST['addStoke']) != null) {
                        $stok =  $_GET['st']  + $_POST['addStoke'];
                    } else {
                        $stok =  $_GET['st']  - $_POST['stoke'];
                    }
                    $sql = "UPDATE `productfullinfo` SET `inStoce` = " . $stok . " WHERE `productfullinfo`.`id` =" . $_GET['id'];
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                // alert('stoke has been upadted ');
                window.location.href = 'home.php';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while crating new file');
            </script> <?php
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                    echo $sql;
                    mysqli_close($connerct);
                    break;
                case 15:
                    $sql = "UPDATE `productsnames` SET `cabelName` ='" . $_POST["name"] . "' WHERE `productsnames`.`id` =" . $_POST["idName"];
                    mysqli_query($connerct, $sql);
                    $sql = "UPDATE `productvalues` SET `actualPrice` = " . $_POST['aPrice'] . ", `interest` = " . $_POST['interest'] . ", `sellPrice` = " . $_POST['sellP'] . " WHERE `productvalues`.`id` =" . $_POST["idValue"];
                    mysqli_query($connerct, $sql);
                    $sql = "UPDATE `productfullinfo` SET `inStoce` = " . $_POST['inStoce'] . " WHERE `productfullinfo`.`id` = " . $_POST['id'];
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('row has been updated ');
                window.location.href = 'home.php';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while crating new file');
            </script> <?php
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                    mysqli_close($connerct);

                    break;
                case 16:
                    $i = $_POST['i'];
                    $int = $i;
                    $i = $i / 100;
                    $sql = "SELECT actualPrice FROM productvalues ";
                    $result = mysqli_query($connerct, $sql); // runing sql
                    while ($row = mysqli_fetch_array($result)) {
                        $price = ($row[0] * $i) + $row[0];
                        $sql = "UPDATE `productvalues` SET `interest` = " . $int . ", `sellPrice` =" . $price . " WHERE CONCAT(`productvalues`.`actualPrice`) =" . $row[0];
                        mysqli_query($connerct, $sql);
                        echo mysqli_error($connerct);
                    }
                        ?><script>
            window.location.href = 'home.php';
        </script>
        <?php
                    mysqli_close($connerct);
                    break;
                case 17:
                    $sql = "UPDATE `customers` SET `fullName` = '" . $_POST["fullName"] . "' WHERE `customers`.`id` =" . $_GET["id"];
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('formal name has been set');
                window.location.href = 'fullInfo.php?cId=<?php echo $_GET['id'] ?>';
            </script><?php

                    } else {

                        ?>
            <script type="text/javascript">
                alert('error occurred while crating new file');
            </script> <?php
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                    mysqli_close($connerct);
                    break;

                case 18:
                    $sql = $_POST["sql"];
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('you account has been moved to archives');
                window.location.href = 'viewAccounts.php';
            </script><?php

                    } else {

                        ?>
            <script type="text/javascript">
                alert('error occurred while crating new file');
            </script> <?php
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                    mysqli_close($connerct);
                    break;
                case 19:
                    $sql = "UPDATE `customersarchive` SET `fullName` = '" . $_POST["fullName"] . "' WHERE `customersarchive`.`id` =" . $_GET["id"];
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                alert('formal name has been set');
                window.location.href = 'fullInfoArchive.php?cId=<?php echo $_GET['id'] ?>';
            </script><?php

                    } else {

                        ?>
            <script type="text/javascript">
                alert('error occurred while crating new file');
            </script> <?php
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                    mysqli_close($connerct);
                    break;
                case 20:
                    if (isset($_POST['phone'])) {
                        $sql = "UPDATE `customersarchive` SET `firstName` = '" . $_POST['first_name'] . "', `lastName` = '" . $_POST['last_name'] . "', `phoneNumber` =" . $_POST['phone'] . " WHERE `id` =" . $_POST['id1'];
                    } else {
                        $sql = "UPDATE `customersarchive` SET `firstName` = '" . $_POST['first_name'] . "', `lastName` = '" . $_POST['last_name'] . "' WHERE `id` =" . $_POST['id1'];
                    }
                    if (mysqli_query($connerct, $sql)) {
                        ?>
            <script type="text/javascript">
                alert('update is done');

                window.location.href = 'AccountsArchive.php';
            </script><?php
                    } else {
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                    break;
            }
                        ?>
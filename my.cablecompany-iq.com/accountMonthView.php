<?php
session_start();

if (!isset($_SESSION["logIn"])) {
    header("Location: login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" href="logo1.jpg" type="image/png" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ec20a1df57.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
   
    <style>
        body {
            font-family: 'Almarai', sans-serif;
            font-family: 'Lato', sans-serif;
            height: 100vh;
        }

        td {
            vertical-align: middle;

        }

        .desktop {
            background: white;
            display: inline-block;
            border-radius: 3em;
            padding: 2vmin 3vmin;
            margin: 1em;
        }

        #i {
            width: 2em;
        }

        .add {
            background: lightgreen;
            display: inline-block;
            border-radius: 3em;
            padding: 1vmin 1vmin;

        }

        .tot {
            display: none;
            /* color: red; */
            font-size: 14px;
        }

        td {
            vertical-align: middle;
        }

        a {
            color: black;
            text-decoration: none;
        }

        ::-webkit-scrollbar {
            width: 10px;

        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 2em;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        #rmain {
            display: none;
        }

        .totalContainer {
            margin-left: 40%;
            margin-right: 5%
        }

        @media print {
            * {
                -webkit-print-color-adjust: exact;
            }

            @page {
  size: A4;
 
}

            a,
            #fn,
            .btn {
                display: none;
            }

            .platform {
                display: none;

            }

            #rmain {
                display: inline;
            }

            .tot {
                display: inline;
                text-align: right;
                z-index: 222;

            }

            #total,
            #total1,
            #rmain {
                font-size: 15px;
            }
            table { page-break-inside:auto }
tr    { page-break-inside:avoid; page-break-after:auto }
thead { display:table-header-group; }
tfoot { display:table-footer-group; }

            #left {
                font-size: 18px;

            }
.gap{
  
}
            body {
                font-family: 'Times New Roman', Times, serif;

                margin-top: 3cm;

                background-image: url(bg1.png);
                background-repeat:repeat-y;
                background-size: 20.5cm 29.7cm;
                font-size: 12px;
                /* padding: 2em; */
                padding-top: 0;
                
            
                margin-bottom: 31cm;
            }

        }
    </style>
    <style>

    </style>
</head>
<?php
include 'dbConnection.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = $_POST['id'];
}
$sql = "SELECT `fullName` FROM `customersarchive` WHERE id=" . $id;
$rs = mysqli_query($connerct, $sql); // running sql
$fullName = mysqli_fetch_array($rs);
if (!isset($fullName)) {
    $sql = "SELECT `fullName` FROM `customers` WHERE id=" . $id;
$rs = mysqli_query($connerct, $sql); // running sql
$fullName = mysqli_fetch_array($rs);
}
?>

<body>


    <br>
    <div class="container">

    </div>
    <br>
    <div class="container">
        <div class="text-center">
            <h4 class="h5 text-start">Date: <?php echo date("d/m/20y ") ?></h4>
            <h3 class="h3 co">Dear: <n style="color: green;"><?php echo $fullName[0] ?></i></h3>

        </div>

        <a onclick="p()"><i class="fas fa-print fa-2x"></i></a>
        <a onclick="hatu()" class="btn btn-primary">Orders</a>
        <a onclick="roishtu()" class="btn btn-danger">Received</a>
        <k style="color: transparent;" id="link"><?php echo $id; ?></k>



        <div id="roishtu">
            <h3 id="fn" class="h3 text-center">Orders</h3>
            <h4>Orders list:</h4>
            <table class="table  table-hover table-bordered  " style="border: black;">

                <thead style="background-color: #7da9f0; border:black" class="table position-static">
   
                    <div class="row">
                        <div id="i" class="col-md-1 ">
                            <td>No.</td>
                        </div>
                        <div class="col-md-4">
                            <td>Cable name </td>
                        </div>
                        <div class="col-md-2">
                            <td>Meters</td>
                        </div>
                        <div id="p" class="col-md-1">
                            <td>Prise of one meter </td>
                        </div>
                        <div class="col-md-3">
                            <td>Total prise</td>
                        </div>
                        <div class="col-md-1">
                            <td>Date of Order</td>
                        </div>

                    </div>
                </thead>
                <tr>
                    <?php


                    // $sql = "SELECT * FROM `accountsell` WHERE `date` BETWEEN '2021-" . $_GET['month'] . "-1' AND '2021-" . $_GET['month'] . "-30' and customer_Id=" . $id;
                    $sql = "SELECT * FROM `accountsell` WHERE  customer_Id=" . $id;
                    $rs = mysqli_query($connerct, $sql); // running sql
                    $total = 0;
                    $cabelCount = 0;
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($rs)) {
                        $i++;
                        $date = explode(" ", $row["date"]);

                        echo '<div class="col-md-1"><td id="i">' . $i  . '</td></div>';
                        echo '<div class="col-md-4"><td>' . $row["cableName"] . '</td></div>';
                        echo '<div class="col-md-2"><td>' . number_format($row["meter"], 2, '.', ',') . ' m</td></div>';
                        echo '<div class="col-md-1"><td id="p">' . number_format($row["pricePerMeter"], 2, '.', ',') . ' $</td></div>';
                        echo '<div class="col-md-3"><td>' . number_format($row["total"], 2, '.', ',') . ' $</td></div>';
                        echo '<div class="col-md-1"><td>' . $date[0] . '</td></div> ';
                    ?>

                </tr>
        </div>
    <?php $total = $total + $row["total"];
                        $cabelCount++;
                    }        ?>

    </div>
    </table>
    <div class="platform row">
        <div class="col-md-6 col-sm-6 text-right">
            <div class="desktop shadow-lg">
                <div class="d-flex flex-row justify-content-center">
                    <div class="text text-left">
                        <p class="p-0 m-0"><?php echo 'no. orders: ' . $cabelCount; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 text-left">
            <div class="desktop shadow-lg">
                <div class="d-flex flex-row justify-content-center">
                    <div class="text text-left">
                        <p class="p-0 m-0"><?php echo 'the total: ' . number_format($total, 2, '.', ',') . " $"; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
<div class="gap">
</div>
    <div id="hatu">
        <h3 id="fn" class="h3 text-center">Received</h3>
        <br>
              <h4>Received list:</h4>
        <table class="table  table-hover table-bordered   " style="border: black;">
            <thead style="background-color:#ff4747; border:black" class="table position-static">
                <tr>
                    <div class="row ">
                        <div id="i" class="col-lg-1 ">
                            <td>No.</td>
                        </div>
                        <div class="col-lg-4">
                            <td>Cable name </td>
                        </div>
                        <div class="col-lg-2">
                            <td>Meters</td>
                        </div>
                        <div id="p" class="col-lg-1">
                            <td>Prise of one meter </td>
                        </div>
                        <div class="col-lg-3">
                            <td>Total prise</td>
                        </div>
                        <div class="col-lg-1">
                            <td>Date of Receive</td>
                        </div>
                    </div>
                </tr>
            </thead>



            <?php

            // $sql = "SELECT * FROM `accountsell` WHERE customer_Id=" . $id." AND `date`=2021-0".$_GET['month']."%";
            // $sql = "SELECT * FROM `accountsell1` WHERE `date` BETWEEN '2021-" . $_GET['month'] . "-1' AND '2021-" . $_GET['month'] . "-31' and customer_Id=" . $id;
            $sql = "SELECT * FROM `accountsell1` WHERE  customer_Id=" . $id;

            $rs = mysqli_query($connerct, $sql); // running sql
            $total1 = 0;
            $cabelCount1 = 0;
            $i = 0;
            while ($row = mysqli_fetch_assoc($rs)) {
                $i++;
                $date = explode(" ", $row["date"]);
                echo '<div class="col-md-1"><td id="i">' . $i  . '</td></div>';
                echo '<div class="col-md-4"><td>' . $row["cableName"] . '</td></div>';
                echo '<div class="col-md-2"><td>' . number_format($row["meter"], 2, '.', ',') . ' m</td></div>';
                echo '<div class="col-md-1"><td id="p">' . number_format($row["pricePerMeter"], 2, '.', ',') . ' $</td></div>';
                echo '<div class="col-md-3"><td>' . number_format($row["total"], 2, '.', ',') . ' $</td></div>';
                echo '<div class="col-md-1"><td>' . $date[0]  . '</td></div> ';
            ?>

                </tr>
    </div>
<?php $total1 = $total1 + $row["total"];
                $cabelCount1++;
            }
            mysqli_close($connerct);    ?>



</table>
<div class="platform row">
    <div class="col-md-6 col-sm-6 text-right">
        <div class="desktop shadow-lg">
            <div class="d-flex flex-row justify-content-center">
                <div class="text text-left">
                    <p class="p-0 m-0"><?php echo 'no. orders: ' . $cabelCount1; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 text-left">
        <div class="desktop shadow-lg">
            <div class="d-flex flex-row justify-content-center">
                <div class="text text-left">
                    <p class="p-0 m-0"><?php echo 'the total: ' . number_format($total1, 2, '.', ',') . " $"; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</div>
<div class="container">
    <div class="totalContainer">
        <p id="total" style="color: blue;" class="h3 tot">The Total Cost of Your Order :<span style="float: right; "><?php echo number_format($total, 2, '.', ',') . " $"; ?></span></p><br>
        <p id="total1" style="color: red;" class="h3 tot">The Total Amount You Have Payed So Far :<span style="float: right; " class="text-end">-<?php echo   number_format($total1, 2, '.', ',') . " $";
                                                                                                                                                $ramin = $total - $total1 ?></p></span><br>
        <hr>
        <p id="rmain">The Reaming Amount You Need To Pay :<span id="left" style="float: right; " class="text-end"><?php echo number_format($ramin, 2, '.', ',') . " $"; ?></span></p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
    function myFunction() {
        var r = confirm("you sure you want to delete this row??");

    }

    function p() {
        lastCheck();
        window.print();
    }

    function roishtu() {
        var x = document.getElementById("hatu");
        var y = document.getElementById("total1");
        if (x.style.display === "none") {
            x.style.display = "";
            y.style.display = "";
        } else {
            x.style.display = "none";
            y.style.display = "none";
        }
    }

    function hatu() {
        var x = document.getElementById("roishtu");
        var y = document.getElementById("total");
        if (x.style.display === "none") {
            x.style.display = "";
            y.style.display = "";
        } else {
            x.style.display = "none";
            y.style.display = "none";
        }
    }

    function lastCheck() {
        var x = document.getElementById("roishtu");
        var y = document.getElementById("hatu");
        var z = document.getElementById("rmain");
        if (x.style.display === "" && y.style.display === "") {
            z.style.display = "";
        } else {
            z.style.display = "none";

        }
    }
</script>

</body>

</html>
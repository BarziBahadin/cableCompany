<?php
session_start();

if(!isset($_SESSION["logIn"])){
header("Location: login.html");

}
?><!DOCTYPE html>
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
     <!-- push test -->
     <script>
        var _img = document.getElementById('id1');
        var newImg = new Image;
        newImg.onload = function() {
            _img.src = this.src;
        }
        newImg.src = 'bg.png';
        document.body.style.backgroundImage = _img;
    </script>
     <title>Berlin</title>
    
     <style>
         body {
             background: linear-gradient(to right top, #65dfc9, #6cdbeb);
             height: 100vh;
             
         }

         .table {
             overflow: auto;

         }

         .table thead th {
             position: sticky;
             top: 0;
             z-index: 1;
             border: #232323;
             background-color: #7da9f0;

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

         .add {
             background: lightgreen;
             display: inline-block;
             border-radius: 3em;
             padding: 1vmin 1vmin;

         }

         ::-webkit-scrollbar {
             width: 10px;

         }

         a {
             color: black;
             text-decoration: none;
         }


         .con {
             height: 50vmin;
             overflow-y: scroll;
             overflow-x: hidden;
             width: 80%;
             margin-left: 10%;
         }

         #total {
             display: none;
             margin-left: 10em;
         }
    
     /* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	/* tr { border: 1px solid #ccc; } */
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
    text-align: end;
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
    text-align: start;
	}
	.con{
        height: 80vmin;
    }
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "#"; }
	td:nth-of-type(2):before { content: "cable name"; }
	td:nth-of-type(3):before { content: "meter"; }
	td:nth-of-type(4):before { content: "price per meter"; }
	td:nth-of-type(5):before { content: "total"; }
	td:nth-of-type(6):before { content: "data"; }

	td:nth-of-type(7):before { content: "Actions"; }
}
   
         @media only print {

             #link,
             a,
             .navbar,
             #edit,
             .platform,
             #fn {
                 display: none;
             }

             #total {
                 display: inline;
                 text-align: center;
                 z-index: 222;
                 margin-left: 10em;
                 color: red;

             }

             .con {
                 width: 100%;
                 margin-left: 0;
                 height: 85%;
             }

             body {
                padding: 4em;
                 font-family: 'Times New Roman', Times, serif;

margin-top: 3cm;
margin-bottom: 3cm;
padding-bottom: 3cm;
                 background-image: url(bg.png);
                 background-repeat: no-repeat;
                 background-size: 20.5cm 29.7cm;
                 font-size: 12px;

             }

         }
     </style>
    
     <script>
         function myFunction() {
             var r = confirm("you sure you want to delete this row??");

         }

         function send() {
             var lnk = document.getElementById("link").innerHTML;
             lnk = "addBerlin.php?idFile=" + lnk;
             console.log(lnk);
             window.location.href = lnk;
         }
     </script>
 </head>
 <?php
    include 'dbConnection.php';

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    } else {
        $id = $_POST['id'];
    }

    $sql = "SELECT `filename` FROM `filename` WHERE id=" . $id;
    $rs = mysqli_query($connerct, $sql); // running sql
    $fileName = mysqli_fetch_array($rs);

    ?>

 <body>


     <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(33, 67, 211, 0.582); padding :0%; ">
         <div class="container-fluid">
             <a href="home.php" class="navbar-brand">Cable company</a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                 <span class="navbar-toggler-icon">
                 </span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav">
                     <li class="nav-item">
                         <a class="nav-link active" href="viewAccounts.php">Accounts</a>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link active" href="fileBerlin.php">Files</a>
                     </li>
                     </li>

                 </ul>
             </div>
         </div>
     </nav>

     <br><br>
     <br>
     <div class="container-flued ">
         <h3 id="fn" class="h3 text-center">File name: <i style="color: green;"><?php echo $fileName[0]; ?></i></h3>
         <k style="color: transparent;" id="link"><?php echo $id; ?></k>

         <a id="edit"><i style="color: red;" onclick="send();" class="fas fa-plus-square fa-5x"></i></a>
         <a onclick="window.print()"><i class="fas fa-print fa-5x"></i></a>

         <div class="con">
             <table class="table table-striped table-hover table-bordered   " style="border:black">

                 <thead style="background-color: #7da9f0; border:black" class="">
                     <div class="row ">
                         <div class="col-md-1 ">
                             <th>No.</th>
                         </div>
                         <div class="col-md-3">
                             <th>Cable name </th>
                         </div>
                         <div class="col-md-2">
                             <th>Meters</th>
                         </div>
                         <div class="col-md-2">
                             <th>Prise of one meter </th>
                         </div>
                         <div class="col-md-2">
                             <th>Total prise</th>
                         </div>
                         <div class="col-md-1">
                             <th>Date </th>
                         </div>
                         <div class="col-md-1">
                             <th id="edit">Action</th>
                         </div>
                     </div>
                 </thead>
                 <tr>
                     <?php

                        $sql = "SELECT * FROM `berlin` WHERE idFileName=" . $id;

                        $rs = mysqli_query($connerct, $sql); // running sql
                        $total = 0;
                        $cabelCount = 0;
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($rs)) {
                            $i++;
                            $date = explode(" ", $row["date"]);
                            echo '<div class="col-md-1"><td>' . $i  . '</td></div>';
                            echo '<div class="col-md-2"><td>' . $row["cabelName"] . '</td></div>';
                            echo '<div class="col-md-2"><td>' . number_format($row["meters"], 2, '.', ',') . 'm</td></div>';
                            echo '<div class="col-md-2"><td>' . number_format($row["pricePerMeter"], 2, '.', ',') . '$</td></div>';
                            echo '<div class="col-md-2"><td>' . number_format($row["priceInTotal"], 2, '.', ',') . '$</td></div>';
                            echo '<div class="col-md-2"><td>' . $date[0] . '</td></div> ';
                        ?><div class="col-md-1">
                             <td id="edit">
                                 <a class="btn btn-primary bm-2" href="updateBerlin.php?edit_id=<?php echo $row["id"]; ?>&id=<?php echo $row["idFileName"] ?>"><i class="fas fa-pen"></i></a>

                                 <a class="btn btn-danger bm-2" onclick="myFunction()"><i class="fas fa-trash-alt"></i></a>
                                 <script>
                                     function myFunction() {
                                         var r = confirm("you sure you want to delete this row??");
                                         if (r == true) {
                                             window.location.href = "deleteBerlin.php?id=<?php echo $row["id"]; ?>&idf=<?php echo $row["idFileName"] ?>"
                                         }
                                     }
                                 </script>
                             </td>
                 </tr>
         </div>
     <?php $total = $total + $row["priceInTotal"];
                            $cabelCount++;
                        }


                        mysqli_close($connerct);
        ?>
     </div>
     </table>
     </div>
     <center>
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
                             <p class="p-0 m-0" style="color: red;"><?php echo 'the total: ' . number_format($total, 2, '.', ',') . "$"; ?></p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         </div>
     </center>
     <center>
         <p id="total" class="p-0 m-0"><?php echo 'the total: ' . number_format($total, 2, '.', ',') . "$"; ?></p>
     </center>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://unpkg.com/smooth-scrollbar@8.5.2/dist/smooth-scrollbar.js"></script>
     <script>
         var Scrollbar = window.Scrollbar;
         Scrollbar.init(document.querySelector('#my-scrollbar'));
     </script>
 </body>

 </html>
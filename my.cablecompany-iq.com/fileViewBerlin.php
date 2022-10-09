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
    <title>file</title>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        body {
            background: linear-gradient(to right top, #65dfc9, #6cdbeb);
            height: 100vh;
        }

        a {
            color: black;
            text-decoration: none;
        }

        .card-box {
            padding: 20px;
            border-radius: 1.5em;
            margin-bottom: 30px;
            background-color: lightgoldenrodyellow;

        }

        .social-links li a {
            border-radius: 50%;
            color: rgba(121, 121, 121, .8);
            display: inline-block;
            height: 30px;
            line-height: 27px;
            border: 2px solid rgba(121, 121, 121, .5);
            text-align: center;
            width: 30px
        }

        .social-links li a:hover {
            color: #797979;
            border: 2px solid #797979
        }

        .thumb-lg {
            height: 88px;
            width: 88px;
        }

        .img-thumbnail {
            padding: .25rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: .25rem;
            max-width: 100%;
            height: auto;
        }

        .text-pink {
            color: #ff679b !important;
        }

        .btn-rounded {
            border-radius: 5em;
        }

        .text-muted {
            color: #98a6ad !important;
        }

        h4 {
            line-height: 22px;
            font-size: 18px;
        }

        .col-lg-2 {
            height: 100em;
        }
    </style>
    <script>
        function send() {
            var lnk = document.getElementById("link").innerHTML;
            var lnk1 = document.getElementById("link1").innerHTML;
            lnk = "newFile.php?month=" + lnk+"&year="+lnk1;
            
            window.location.href = lnk;
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(33, 67, 211, 0.582); padding :0%; ">
        <div class="container-fluid">
            <a href="home.php" class="navbar-brand">Cable company</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="viewAccounts.php">Accounts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="fileBerlin.php">Files</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row pt-2 pb-5">
            <h3 class="h3">
                Year : <i><?php echo  $_GET["year"] ?></i>
            </h3>
            <h3 class="h3">
                month : <i><?php echo  $_GET["month"] ?></i>
            </h3>
            <br>
            <k style="color: transparent;" id="link"><?php echo  $_GET["month"] ?></k>
            <k style="color: transparent;" id="link1"><?php echo  $_GET["year"] ?></k>
            <i style="color: red;" onclick="send();" class="fas fa-folder-plus fa-5x"></i>
            <form class="col-md-3">


                <label for="exampleInputEmail1" class="form-label">Search</label>
                <div>
                    <input class="form-control" name="name" id="search_input1">
                </div>
            </form>
            <br>
        </div>
        <div class="platform row">
            <?php
            include 'dbConnection.php';

            $sql = "select * from `filename` where `date` BETWEEN '" . $_GET["year"] . "-" . $_GET["month"] . "-1' and '" . $_GET["year"] . "-" . $_GET["month"] . "-31'";
            $rs = mysqli_query($connerct, $sql); // running sql
            $i = 0;
            while ($name = mysqli_fetch_array($rs)) {
                $i++;
                echo '  <div id="con" class="col-md-3">
                <div class="text-center card-box shadow">
                    <div class="member-card pt-2 pb-2">
                        <div>  
                        <a style="display: none;" id="name' . $i . '">' . $name[0] . '</a>
                        
                        ';

                echo '<h4  id="name' . $i . '">' .  $name[1] . '<a class="text-muted">' . $name[2] . '</a></h4>';

                echo ' <hr>
                <a onclick="val1(' . $i . ');"  class="btn btn-primary "><i class="fas fa-pen"></i></a>
                <a onclick="val(' . $i . ');"  class="btn btn-dark "><i class="fas fa-folder-open"></i></a>
                <a onclick="myFunction(' . $i . ');"  class="btn btn-danger "><i class="fas fa-trash-alt"></i></a>
                
                
                </div>
            </div>
        </div> </div>';
            }

            ?>
            <script>
                function myFunction(i) {
                    var r = confirm("you sure you want to delete this file??");
                    if (r == true) {
                        val2(i);
                    }
                }
            </script>
        </div>
    </div>
    <form id="form" action="berlin.php" method="POST">
        <input type="hidden" name="id" id="in" aria-label="Sell Price">

    </form>
    <form id="form1" action="renameFile.php?month=<?php echo  $_GET["month"] ?>&year=<?php echo  $_GET["year"] ?>" method="POST">
        <input type="hidden" name="id1" id="in1" aria-label="Sell Price">


    </form>
    <form id="form2" action="deleteBerlin.php?month=<?php echo  $_GET["month"] ?>&year=<?php echo  $_GET["year"] ?>&case=4" method="POST">

        <input type="hidden" name="id2" id="in2" aria-label="Sell Price">

    </form>
    <script>
        function val(index) {
            var name = "name" + index;
            var value = document.getElementById(name).innerHTML;
            var res = value.split(" ");
            document.getElementById('in').value = res[0];
            document.getElementById("form").submit();
        }

        function val1(index) {
            var name = "name" + index;
            var value = document.getElementById(name).innerHTML;
            var res = value.split(" ");
            document.getElementById('in1').value = res[0];
            document.getElementById("form1").submit();
        }

        function val2(index) {
            var name = "name" + index;
            var value = document.getElementById(name).innerHTML;
            var res = value.split(" ");
            document.getElementById('in2').value = res[0];
            document.getElementById("form2").submit();
        }
    </script>
</body>
<script src="accountSearch.js"></script>

</html>
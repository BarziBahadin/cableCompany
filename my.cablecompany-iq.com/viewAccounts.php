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

    <title>view Accounts</title>
    <style>
        body {
            background-color: #FFF;
            overflow-x: hidden;
        }

        .card-box {
            padding: 20px;
            border-radius: 1.5em;
            margin-bottom: 30px;
            background-color: #fff;
            background: linear-gradient(to right top, rgba(3, 107, 201, 0.382), #91faf5);
            height: 15em;

        }

        .member-card {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 2em;
            /* vertical-align:center; */
        }

        .center {
            margin-top: 2rem;
            margin-bottom: 2rem;

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
            border-radius: 2em;
        }

        .text-muted {
            color: #98a6ad !important;
        }

        h4 {
            line-height: 22px;
            font-size: 18px;
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
    </style>
    <script src="https://kit.fontawesome.com/ec20a1df57.js" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(3, 127, 211, 0.582); padding :0%; ">
        <div class="container-fluid">
            <a href="home.php" class="navbar-brand">Cable company</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">


                    <li class="nav-item">
                        <a class="nav-link active" href="fileBerlin.php">Berlin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row pt-2 pb-5">
            <div class="col-md-12">

                <a href="newAccount.php" class="" style="color: blue; width:10%"><i class="fas fa-user-plus fa-5x"></i></a>
                <a href="AccountsArchive.php" class="text-end" style="color: #3e3e3e;  float: right;"><i class="fas fa-database fa-5x"></i></a>
            </div>
            <form id="con" class="col-md-3">
                <br> <label for="exampleInputEmail1" class="form-label">Search</label>
                <div>
                    <input class="form-control shadow" name="name" id="search_input1">
                </div>
            </form>



        </div>



        <div class="platform row">

            <?php
            include 'dbConnection.php';
            $sql = "SELECT * FROM `customers`";
            $rs = mysqli_query($connerct, $sql); // runing sql
            // geiting the IDssss 
            $i = 0;
            while ($name = mysqli_fetch_array($rs)) {
                $i++;
                ?>
                <div id="con" class="col-md-3">
                <?php
                echo '
                    <div class="text-center card-box shadow">
                        <div class="member-card pt-2 pb-2">
                            <div class="center">                             
                             <a style="display: none;" id="name' . $i . '">' . $name[0] . '</a>
                            ';
                echo '<h4 class="name" >' . $name[1] . " " . $name[2] . '</h4>';
                echo '<p  class="mb-0 fw-light">' . $name[4] . '</p>';
                echo ' <hr>
                    <a onclick="val(' . $i . ');"  class="btn btn-dark shadow">View</a>
                    <a onclick="val1(' . $i . ');"  class="btn btn-danger shadow">delete</a>
                    
                    </div>
                </div>
            </div> ';?>
                </div>
            <?php          }
            ?>
            <!-- px-5 py2 mb-5 -->
    
        </div>
    </div>
    <form id="form" action="fullInfo.php" method="POST">
        <input type="hidden" name="id" id="in" aria-label="Sell Price">
    </form>
    <form id="form1" action="dbm.php?case=18" method="POST">
        <input type="hidden" name="sql" id="in1" aria-label="Sell Price">
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
            var r = confirm("you sure you want to move the account to Archives??");
            if (r == true) {
            var name = "name" + index;
            var value = document.getElementById(name).innerHTML;
            var res = value.split(" ");
            var sql = "DELETE from customers where id=" + res[0];
            document.getElementById('in1').value = sql;
            document.getElementById("form1").submit();
        }}
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://unpkg.com/smooth-scrollbar@8.5.2/dist/smooth-scrollbar.js"></script>
    <script src="accountSearch.js"></script>

</body>
<script>
    var Scrollbar = window.Scrollbar;

    Scrollbar.init(document.querySelector("#my-scrollbar"));
</script>

<script>

var width = document.documentElement.clientWidth;
    var con = document.querySelectorAll("#con");
    if ( width < 991 && width> 768) {
        for (let index = 0; index < con.length; index++) {
            con[index].classList.remove("col-md-3");
            con[index].classList.add("col-md-4");
           
        }

    }
    console.log(width);
</script>

</html>
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
    <title>Files</title>
    <style>
        body {
            background: linear-gradient(to right top, #65dfc9, #6cdbeb);
            height: 100vh;
            overflow-x: hidden;
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
    </style>

</head>

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


                </ul>
            </div>
        </div>
    </nav>
    <script>
        function go(month) {
            var sel = document.getElementById('year');
            var url = "fileViewBerlin.php?month=" + month + "&year=" + sel.value;
            window.location.href = url;
        }
    </script>
    <div class="container">
        <br><br>
        <div class="col-md-3">
            <select class="form-select " id="year" aria-label="Default select example">
                <option value="2021" selected>2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>

        </div>

        <div class="row">

            <?php
            include 'dbConnection.php';
            for ($i = 1; $i < 13; $i++) {
                echo '<div id="con" class="col-md-4"><d onclick="go(' . $i . ')"><i class="far fa-folder fa-7x">' . $i . '</i></d></div><br>';
            }


            ?></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://unpkg.com/smooth-scrollbar@8.5.2/dist/smooth-scrollbar.js"></script>
    <script>
        var Scrollbar = window.Scrollbar;
        Scrollbar.init(document.querySelector('#my-scrollbar'));
    </script>
    <script>
        var width = window.innerWidth;

        console.log(width);
        var con = document.querySelectorAll("#con");
        if (width < 986) {
            for (let index = 0; index < con.length; index++) {
                con[index].classList.remove("col-sm-3");
                con[index].classList.add("col-sm-4");

            }

        }
    </script>
</body>

</html>
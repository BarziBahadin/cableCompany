<?php
session_start();

if(!isset($_SESSION["logIn"])){
header("Location: login.html");

}
?><!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" href="logo1.jpg" type="image/png" />
    <script src="https://kit.fontawesome.com/ec20a1df57.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="show.css">
    <title>home</title>
    <script>
        function send() {
            window.location.href = "newItem.php"
        }

        function search() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById("table");
            li = ul.getElementsByTagName('tr');

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("td")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";

                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
    <style>
        body {
            overflow-x: hidden;
               overflow-y: hidden;
            background-color: rgba(233, 233, 251, 0.582);
        }

        .table thead th {
            position: sticky;
            top: 0;
            z-index: 1;
            border: #232323;
            background: lightgray;
        }


        #top {
            width: 5em;
            margin: 0;
            text-align: center;
        }

        #action {
            width: 31em;
            margin: 0;
        }

        #top1 {
            width: 5em;
            margin: 0;

            text-align: center;

        }

        #id {
            width: 10px;
        }



        #name {
            width: 15em;
        }

        #sub {

            margin: 0px;
        }

        .table.sticky.th {
            position: sticky;
            top: 0;
        }

        table {

            width: 90%;

            overflow: auto;



        }

        td {
            vertical-align: middle;
            padding: 0;
        }

        .con {
            height: 70vmin;
            overflow-y: scroll;
            overflow-x: hidden;

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
            <a href="#" class="navbar-brand">Cable company</a>
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
                        <a class="nav-link active" href="fileBerlin.php">Berlin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <h1 class="h2 mb-2 fw-normal center" style="text-align: center; color:#232323;">List of available Products </h1>
    <div class="container-flued">

        <div class="row" style="margin: 4%; margin-bottom:0; margin-top:0;">
            <h4 class="h4 text-end"><?php echo date("l d/M/20y") ?></h4>
            <form class="col-sm-3">
                <label for="exampleInputEmail1" class="form-label">Search</label>
                <div>
                    <input class="form-control" onkeyup="remove();" name="name" id="search_input" aria-describedby="emailHelp">
                </div>
            </form>
            <form class="col-sm-3" action="dbm.php?case=16" method="POST">
                <label for="exampleInputEmail1" class="form-label">update Interest</label>
                <div>
                    <input class="form-control" name="i" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <button style="display:none"></button>
                </div>
            </form>
            <br>
        </div>
    </div>
    <div class="ms-5">
        <i style="color: red;" onclick="send();" class="fas fa-plus-square fa-3x "></i>
    </div>

    <div class="container-flued">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div id="con" class="con">
                    <table id="table" class="table table-striped table-hover table-bordered sticky" data-toggle="table">
                        <thead>
                            <tr>
                                <th class="th" id="id" data-type="number">#</th>
                                <th class="th" id="name">Name</th>
                                <th class="th" id="top1">Actual price</th>
                                <th class="th" id="top1">Interest</th>
                                <th class="th" id="top">Sell price</th>
                                <th class="th" id="top">In stock</th>
                                <th id="action" class="text-center th">Actions <i class="fas fa-wrench"></i></th>
                            </tr>
                        </thead>

                        <tbody class="main-content">
                            <tr>
                                <?php
                                include 'dbConnection.php';
                                $sql = "SELECT * FROM `productfullinfo`";
                                $rs = mysqli_query($connerct, $sql); // runing sql
                                // geiting the IDssss 
                                $i = 0;
                                while ($ids = mysqli_fetch_assoc($rs)) { // $ids is from productfullinfo
                                    $sql = "SELECT `cabelName` FROM `productsnames` where id= " . $ids["productsnames_id"];
                                    $result = mysqli_query($connerct, $sql); // runing sql
                                    $name = mysqli_fetch_array($result); // geting the name 
                                    $sql = "SELECT actualPrice, interest, sellPrice FROM `productvalues` where id=" . $ids["productvalues_id"];
                                    $result = mysqli_query($connerct, $sql); // runing sql
                                    $values = mysqli_fetch_assoc($result); // geing back the valurs like the date of the tings 
                                    $i++;
                                ?>
                                    <td id="id"><?php echo $i ?></td>
                                    <td id="name"><?php echo $name[0] ?></td>
                                    <td id="top1"><?php echo $values["actualPrice"] ?>$</td>
                                    <td id="top1"><?php echo $values["interest"] ?>%</td>
                                    <td id="top"><?php echo $values["sellPrice"] ?>$</td>
                                    <td id="top"><?php echo $ids["inStoce"] ?> m </td>
                                    <td id="action">
                                        <form action="dbm.php?id=<?php echo $ids["id"] ?>&st=<?php echo $ids["inStoce"] ?>" method="POST">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input class="form-control" placeholder="remove form stoke" name="stoke" type="number">
                                                        <input class="form-control" type="hidden" name="case" value="14">

                                                    </div>

                                                    <div class="col-md-2">
                                                        <a id="sub" href="updateBerlin.php?edit_id=<?php echo $ids["id"] ?>&case=3" class="btn btn-primary "><i class="fas fa-pen"></i></a>
                                                        <a id="sub" onclick="myFunction()" style="float: left;" class="btn btn-danger me-3"><i class="fas fa-trash"></i></a>
                                                        <script>
                                                            function myFunction() {
                                                                var r = confirm("you sure you want to delete this row??");
                                                                if (r == true) {
                                                                    window.location.href = "deleteBerlin.php?edit_id=<?php echo $ids["id"] ?>&case=5"
                                                                }
                                                            }
                                                        </script>
                                                    </div>
                                                    <div class="col-md-5" id="">
                                                        <input class="form-control" placeholder="add to stoke" name="addStoke" type="number">
                                                    </div>
                                                </div>
                                            </div>
                                            <button style="display:none"></button>
                                        </form>
                                    </td>
                            </tr>
                        <?php
                                }
                                mysqli_close($connerct);
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <ul id="menu" class="absolute bg-gray-100 border border-gray-400 shadow-xl rounded p-2 hidden">
    </ul>
    <script src="search.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menu = document.getElementById('menu');
            const table = document.getElementById('table');
            const cells = [].slice.call(table.querySelectorAll('th, td'));
            const headers = [].slice.call(table.querySelectorAll('th'));
            const numColumns = headers.length;
            const thead = table.querySelector('thead');
            thead.addEventListener('contextmenu', function(e) {
                e.preventDefault();

                const rect = thead.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                menu.style.top = `${y}px`;
                menu.style.left = `${x}px`;
                menu.classList.toggle('hidden');

                document.addEventListener('click', documentClickHandler);
            });

            // Hide the menu when clicking outside of it
            const documentClickHandler = function(e) {
                const isClickedOutside = !menu.contains(e.target);
                if (isClickedOutside) {
                    menu.classList.add('hidden');
                    document.removeEventListener('click', documentClickHandler);
                }
            };

            const showColumn = function(index) {
                cells
                    .filter(function(cell) {
                        return cell.getAttribute('data-column-index') === `${index}`;
                    })
                    .forEach(function(cell) {
                        cell.style.display = '';
                        cell.setAttribute('data-shown', 'true');
                    });

                menu.querySelectorAll(`[type="checkbox"][disabled]`).forEach(function(checkbox) {
                    checkbox.removeAttribute('disabled');
                });
            };

            const hideColumn = function(index) {
                cells
                    .filter(function(cell) {
                        return cell.getAttribute('data-column-index') === `${index}`;
                    })
                    .forEach(function(cell) {
                        cell.style.display = 'none';
                        cell.setAttribute('data-shown', 'false');
                    });
                // How many columns are hidden
                const numHiddenCols = headers
                    .filter(function(th) {
                        return th.getAttribute('data-shown') === 'false';
                    })
                    .length;
                if (numHiddenCols === numColumns - 1) {
                    // There's only one column which isn't hidden yet
                    // We don't allow user to hide it
                    const shownColumnIndex = thead.querySelector('[data-shown="true"]').getAttribute('data-column-index');

                    const checkbox = menu.querySelector(`[type="checkbox"][data-column-index="${shownColumnIndex}"]`);
                    checkbox.setAttribute('disabled', 'true');
                }
            };

            cells.forEach(function(cell, index) {
                cell.setAttribute('data-column-index', index % numColumns);
                cell.setAttribute('data-shown', 'true');
            });

            headers.forEach(function(th, index) {
                // Build the menu item
                const li = document.createElement('li');
                const label = document.createElement('label');
                const checkbox = document.createElement('input');
                checkbox.setAttribute('type', 'checkbox');
                checkbox.setAttribute('checked', 'true');
                checkbox.setAttribute('data-column-index', index);
                checkbox.style.marginRight = '.25rem';

                const text = document.createTextNode(th.textContent);

                label.appendChild(checkbox);
                label.appendChild(text);
                label.style.display = 'flex';
                label.style.alignItems = 'center';
                li.appendChild(label);
                menu.appendChild(li);

                // Handle the event
                checkbox.addEventListener('change', function(e) {
                    e.target.checked ? showColumn(index) : hideColumn(index);
                    menu.classList.add('hidden');
                });
            });
        });
    </script>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://unpkg.com/smooth-scrollbar@8.5.2/dist/smooth-scrollbar.js"></script>
<script>

</script>

</html>
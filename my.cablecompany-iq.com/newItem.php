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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" href="logo1.jpg" type="image/png" />
    <title>new Item</title>
    <style>
        body {
            height: 100vh;
            background: linear-gradient(to right top, #65dfc9, #6cdbeb);
            
        }

        /* the back ground of the form
        .con {
            background-color: white;
            border: 10px solid rgba(216, 218, 99, 0.589);
            border-radius: 15px 15px 15px 15px;
            height:15vh;
            width: 75%;
            padding: 1.5%;
            margin: auto;
            margin-top: 5%;
            display: flex;
            align-items: baseline;
            justify-content: center;
        } */

        /* Dropdown Content (Hidden by Default) */
     
        .dropdown-content {
            left: auto;
            display: none;
            background-color: #f6f6f6;
            width: 400px;
            border: 1px solid #ddd;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
        .show {
            display: block;

        }

        .main-content {
            /* margin-left: 5%; */
            width: auto;
            height: 40vh;
            overflow: auto;
            z-index: 1;

        }

        #myInput:hover {
            display: block;

        }

        #myUL {
            margin: auto;
        }

        li {
            list-style-type: none;

        }


        .heder {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 5vh;

        }
    </style>
    <script>
   
        function goBack() {
            window.history.back();
        }
     function clos() {
            document.getElementById("my-scrollbar").style.display = "none";
        }

        function go() {
            var item = document.querySelectorAll("#myUL a");
            for (let index = 0; index < item.length; index++) {
                item[index].onclick = function() {
                    document.getElementById("myInput").value = this.innerHTML;
                    document.getElementById("my-scrollbar").style.display = "none";
                }
            }
        }

        function showList() {
            document.getElementById("my-scrollbar").style.display = "block";
            document.getElementById("my-scrollbar").classList.toggle("show");
            var Scrollbar = window.Scrollbar;
            Scrollbar.init(document.querySelector('#my-scrollbar'));
        }

        function search() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName('li');

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";

                } else {
                    li[i].style.display = "none";
                }
            }
        }

        function arithmatic() {
            var price = document.getElementById("price").value;
            var intrest = document.getElementById("inter").value;
            intrest = intrest / 100;
            intrest = intrest * price;
            price = Number(intrest) + Number(price);

            console.log(price);
            document.getElementById("sell").value = price;
        }
    </script>
     <script src="https://kit.fontawesome.com/ec20a1df57.js" crossorigin="anonymous"></script>

</head>

<body>
<div class="container">
         <a class="" onclick="window.history.back();"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
     </div>


    <div class="heder">
        <h3 class="h3 mb-3 fw-normal">insert new data</h3>
    </div>
    <form class="con" action="dbm.php" method="POSt">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <label for="name" class="form-label">cable name</label>
                </div>
                <div class="col-sm-2">
                    <label for="price" class="form-label">the price thet you payed</label>
                </div>
                <div class="col-sm-1">  
                    <label for="interest" class="form-label">interest</label>
                </div>
                <div class="col-sm-2">
                    <label for="sellPrice" class="form-label">Sell Price</label>
                    <input type="hidden" name="case" aria-label="Sell Price" value="1" require>
                </div>
                <div class="col-sm-2">
                    <label for="interest" class="form-label">how much is in stoke</label>
                </div>


            </div>
            <div class="row">
                <div class="col-sm-4">
                        <input type="text" class="form-control" name="name" aria-label="Cabel Name" onmouseup="clos()" onmouseover="showList()" onclick="showList()" type="text" id="myInput" onkeyup="search()" placeholder="Search for cable.." require>
                        <div id="my-scrollbar" class="dropdown-content main-content">
                            <ul id="myUL">
                                <?php
                                include 'dbConnection.php';
                                $sql = "SELECT `cabelName` FROM `productsnames`";
                                $result = mysqli_query($connerct, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <li id="li"><a onclick="go()"><?php echo $row["cabelName"];
                                                                }
                                                                mysqli_close($connerct); ?></a></li>
                            </ul>
                        </div>
                        <a href="newName.html">add to list</a>
                </div>
                <div class="col-sm-2">
                    
                <input type="number"  step=0.01 onkeyup="arithmatic()" id="price" class="form-control" name="price" aria-label="Actual Price" require>
                </div>
                <div class="col-sm-1">
                    <input type="number"  step=0.01  id="inter" onkeyup="arithmatic()" class="form-control" name="interest" aria-label="Interest" require>
                </div>
                <div class="col-sm-2">
                    <input id="sell" type="number"  step=0.01 class="form-control" name="sellPrice" aria-label="Sell Price" require>
                </div>
                <div class="col-sm-2">
                    <input type="number"  step=0.01 id="inter" class="form-control" name="inStoce" aria-label="Interest" require>
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary bm-3">submit</button>
                </div>
               
            </div>
        </div>
    </form>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://unpkg.com/smooth-scrollbar@8.5.2/dist/smooth-scrollbar.js"></script>
<script>
    // var Scrollbar = window.Scrollbar;

    // Scrollbar.init(document.querySelector('#my-scrollbar'));
</script>
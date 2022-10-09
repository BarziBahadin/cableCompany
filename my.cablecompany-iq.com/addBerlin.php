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
    <title>add to berlin</title>
    <script src="input.js"></script>
    <link rel="stylesheet" href="fullInfo.css">
    <style>
        body {
            height: 100vh;
            background: linear-gradient(to right top, #6d536b, #6cdbeb);
        }

        .container {
            background-color: rgba(240, 240, 240, 0.4);

            border-radius: 2em;
            width: 60vmin;
            height: 55vmin;
            padding: 1.5%;
            margin: auto;
            margin-top: 5%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 3;
        }

        form {
            margin-top: 15vmin;
            width: 60vmin;
            height: 55vmin;
        }
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
    /*width: relative;*/
    height: 40vh;

    overflow: auto;
    z-index: 1;
    display: none;
position: absolute;
}


#myUL {
    margin: auto;
}


.heder {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 5vh;

}
li {
  list-style: none;  
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
    <script>
        function goBack() {
            window.history.back();
        }

        function arithmatic() {
            var draw = document.getElementById("meter").value;
            var sell = document.getElementById("price").value;
            var price = Number(sell) * Number(draw);
            document.getElementById("total").value = price;
        }
    </script>
    <script src="https://kit.fontawesome.com/ec20a1df57.js" crossorigin="anonymous"></script>

</head>

<body> 
<div class="m-5">

    <a class="" onclick="window.history.back();"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
</div>


    <div class="container  shadow">
        <form action="dbm.php" method="POSt">
            <h1 class="h3 mb-3 fw-normal">add to berlin </h1>
            <div class="row">
                <div class="col-md-6">
                    <label for="name" class="form-label">cable name</label>
                    <input type="text" class="form-control" name="cn" aria-label="Cabel Name" id="myInput1" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="myInput">Search of cable names</label>
                    <input type="text" class="form-control" aria-label="Cabel Name" onloadstart="clos()" type="text" id="myInput" onclick="showList();" onkeyup="search()" placeholder="Search for cable.." require>
                    <div id="my-scrollbar" class="dropdown-content main-content col-md-3">
                        <ul id="myUL" class="">
                            <?php
                            include 'dbConnection.php';
                            $sql = "SELECT `cabelName` FROM `productsnames`";
                            $result = mysqli_query($connerct, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?><li id="li"><a onclick="go()"><?php echo $row["cabelName"];
                                                        }
                                                        mysqli_close($connerct); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="price" class="form-label">how many meters</label>
                    <input type="number" onkeyup="arithmatic();" id="meter" step=0.01 class="form-control" name="meter" aria-label="Actual Price" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="price" class="form-label">price of 1 meter</label>
                    <input type="number" onkeyup="arithmatic();" id="price" step=0.01 maxlength="11" class="form-control" name="price" aria-label="Actual Price" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="price" class="form-label">total</label>
                    <input type="number" id="total" class="form-control" step=0.01 name="total" aria-label="Actual Price" required>
                </div>
                <input type="hidden" name="case" aria-label="Sell Price" value="6">
                <input type="hidden" name="idFile" aria-label="Sell Price" value="<?php echo $_GET['idFile'] ?>">
            </div>
            <br>
            <center>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary bm-3">submit</button>
                    <button type="button" class="btn btn-danger"><a onclick="window.goBack();" style="text-decoration: none; color : rgb(255,255,255)">cancel</a></button>

                </div>
            </center>
        </form>
    </div>
</body>

</html>
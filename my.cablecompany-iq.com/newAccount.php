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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/ec20a1df57.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="logo1.jpg" type="image/png" />
    <title>New Account</title>

    <style>
        body {
            height: 100vh;
            background: linear-gradient(to right top, #e9a4e6, #6cdbeb);
                overflow-y: hidden;
                    overflow-x: hidden;
        }

        .con {
            background-color: rgba(240, 240, 240, 0.4);
            border: 10px solid rgba(25, 231, 152, 0.589);
            border-radius: 15px 15px 15px 15px;
            width: 420px;
            height: 360px;
            padding: 1.5%;
            margin: auto;
            margin-top: 5%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 3;
            overflow-y: hidden;
            
        }
    </style>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</head>

<body>  
    <div class="con">
        <form action="dbm.php" method="POSt">
            <h1 class="h3 mb-3 fw-normal">Creat New Account</h1>
            <div class="row">
                <label for="name" class="form-label">first name</label>
                <input type="text" class="form-control" name="fn" aria-label="Cabel Name" require>
            </div>
            <div class="row">
                <label for="price" class="form-label">last name</label>
                <input type="text" class="form-control" name="sn" aria-label="Actual Price" require>
            </div>
            <div class="row">
                <label for="price" class="form-label">Phone number</label>
                <input type="text" maxlength="11" class="form-control" name="phn" aria-label="Actual Price"
                    placeholder="0770-000-0000"  require>
                    <input type="hidden" name="case" aria-label="Sell Price" value="3">
            </div>
            <br>
            <center>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary bm-3">submit</button>
                    <button type="button" class="btn btn-danger"><a href="home.php"
                            style="text-decoration: none; color : rgb(255,255,255)">cancel</a></button>
                </div>
            </center>
        </form>
    </div>
<br><br>
<center>
    <a class="back"  onclick="window.history.back();"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
 </center>
</body>

</html>
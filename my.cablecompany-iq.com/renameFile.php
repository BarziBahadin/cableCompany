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
    <title>rename file</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     <link rel="shortcut icon" href="logo1.jpg" type="image/png" />
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/ec20a1df57.js" crossorigin="anonymous"></script>
<style>
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
        }
</style>
</head>
<body>

<div class="con">
        <form action="dbm.php?fid=<?php echo $_POST["id1"];?>&month=<?php echo $_GET['month']?>&year=<?php echo $_GET['year']?>" method="POST">
            <h1 class="h3 mb-3 fw-normal">rename file</h1>
            <div class="row">
                <label for="name" class="form-label">File name</label>
                <input type="text" class="form-control" name="fn" aria-label="Cabel Name" require>
            </div>
           
       
                <input type="hidden" name="case" aria-label="Sell Price" value="13">
            <br>         <input type="hidden" name="month" aria-label="Sell Price" value="<?php echo $_GET['month'];?>">
            <center>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary bm-3">submit</button>
                    <button type="button" class="btn btn-danger" onclick=" window.history.back();"><a 
                            style="text-decoration: none; color : rgb(255,255,255)">cancel</a></button>
                </div>
            </center>
        </form>
    </div>

</body>
</html>
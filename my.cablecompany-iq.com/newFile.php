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
    <title>New file</title>

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
    <style>
        body {
            background: linear-gradient(to right top, #65dfc9, #6cdbeb);
            height: 100vh;
        }

        a {
            color: black;
            text-decoration: none;
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
        }
    </style>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>

<body>
    <button class="btn btn-primary bm-3" type="button" style="margin: 1% 0% 0% 1%;" class="btn btn-secondary" onclick="window.goBack()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="20px" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z">
            </path>
        </svg>
        <span class="visually-hidden">Button</span>
    </button>
    <div class="con">
        <form action="dbm.php?month=<?php echo $_GET['month']; ?>" method="POST">
            <h1 class="h3 mb-3 fw-normal">Create New File</h1>
            <div class="row">
                <label for="name" class="form-label">File name</label>
                <input type="text" class="form-control" name="fn" aria-label="Cabel Name" require>
            </div>

            <div class="row">
                <label for="price" class="form-label">Phone number</label>
                <input type="text" maxlength="11" class="form-control" name="phn" aria-label="Actual Price" placeholder="0770-245-6678">
                <input type="hidden" name="case" aria-label="Sell Price" value="11">

            </div>
            <br>
            
             <input type="hidden" name="month" aria-label="Sell Price" value="<?php echo $_GET['month']; ?>">
             <input type="hidden" name="year" aria-label="Sell Price" value="<?php echo $_GET['year']; ?>">
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
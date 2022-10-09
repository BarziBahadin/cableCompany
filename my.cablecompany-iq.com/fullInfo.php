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
    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet"> -->

    <title>Profile</title>
    <link rel="stylesheet" href="fullInfo.css">
    <style>
    .dropdown-content {
    left: auto;
    display: none;
    background-color: #f6f6f6;
    width: 400px;
    border: 1px solid #ddd;

}
.content-fluid {
        margin-left: 5em;
     
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

        .fullScreen {
            width: 90%;
            height: 90%;
            position: absolute;
            top: 2.5em;
            left: 0;
            margin-left: 3%;
        }

        body {
            /* background: linear-gradient(to right top, #65dfc9, #ee1deb); */
            height: 100vh;
            width: 100%;
            overflow-x: hidden;

        }

        #home {
            height: 50vmin;
        }

        nav-item button {
            margin-left: 53em;
        }

        #R {
            color: red
        }

        #b {
            color: lightskyblue;
        }

        iframe {
            height: 75vmin;
            width: 100%;
        }

        .shadow {
            border-radius: 1em;
        }

    </style>
<style>
    .gap
{
    height: 50px
}
@media only screen and (max-width: 768px) {
    body{
        float: left;
        margin: 0; 
        padding: 0;  
    }
    .gap{
        height: 20px;
    }
    .rod{
        width: 600px;
    }
    .content-fluid {
        margin: 0;
     
    }
}

</style>
    <script>
        var tabEl = document.querySelector('button[data-bs-toggle="tab"]')
        tabEl.addEventListener('shown.bs.tab', function(event) {
            event.target // newly activated tab
            event.relatedTarget // previous active tab
        })
        var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
        triggerTabList.forEach(function(triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function(event) {
                event.preventDefault()
                tabTrigger.show()
            })
        })
        var triggerEl = document.querySelector('#myTab a[href="#profile"]')
        bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name

        var triggerFirstTabEl = document.querySelector('#myTab li:first-child a')
        bootstrap.Tab.getInstance(triggerFirstTabEl).show() // Select fir

        function arithmatic() {
            var draw = document.getElementById("meter").value;
            var sell = document.getElementById("price").value;
            var price = Number(sell) * Number(draw);
            document.getElementById("total").value = price;
        }

        function arithmatic1() {
            var draw = document.getElementById("meter1").value;
            var sell = document.getElementById("price1").value;
            var price = Number(sell) * Number(draw);
            document.getElementById("total1").value = price;

        }
    </script>
    <script src="input.js"></script>
    
    <link rel="stylesheet" href="fullinfo.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(3, 127, 211, 0.582); padding :0%; ">
        <div class="container-fluid ">
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
                        <a class="nav-link active" href="newAccount.php">New Account</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="fileBerlin.php">Berlin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    include 'dbConnection.php';


    if (isset($_GET['cId'])) {
        $id = $_GET['cId'];
    } else {
        $id = $_POST['id'];
    }

    $sql = "SELECT * FROM `customers` WHERE id =" . $id;
    $result = mysqli_query($connerct, $sql); // runing sql
    $row = mysqli_fetch_array($result);
    $name = $row[1] . ' ' . $row[2];

    $total = 0;
    $total1 = 0;

    $date = explode(" ", $row[5]);
    ?>
    <a style="display: none;" id="custumer_ID"><?php echo $id ?></a>
   <div class="gap"></div>
    <a style="position: absolute; display:none;  " class="text-end" id="re" onclick="re()"><i class="fas fa-compress-alt fa-3x"></i></a>
    <div class="container-fluid" >
        <!-- heder -->
        <div class="row">
            <div class="col-md-12">
                <h1><i class="fas fa-id-card"></i> <?php echo $name ?></h1>

                <h4><i class="fas fa-phone"></i> <?php echo $row[4]; ?></h4>

            </div>
            <h4><i class=""></i>Formal Name:
                <form class="form col-md-2" action="dbm.php?id=<?php echo $id ?>&case=17" method="POST">
                    <input type="text" name="fullName" class="form-control shadow-sm" value="<?php echo $row[3]; ?>">
                    <button style="display: none;"></button>
                </form>
            </h4>

        </div>
        <!-- boody -->
        <div class="row">
            <div class="col-md-3 h4 rod">
                <!--left col-->
                <ul class="list-group shadow">
                    <li class="list-group-item text-strong">
                        <h4>since: <?php echo $date[0] ?> </h4>
                    </li>
                    <li class="list-group-item text-muted">Account</li>
                    <li class="list-group-item" style="color: blue;"><span>have to pay:</span><strong style="float: right;" id="tot"></strong>
                    </li>
                    <li class="list-group-item" style=" color: red;"><span>payed so far:</span><strong style="float: right; " id="tot1"></strong>
                    </li>
                    <li class="list-group-item" style="color: green; "><span>ramming amount:</span><strong style="float: right; " id="tot2"></strong>
                    </li>
                </ul>
            </div>
            <!--/col-3-->
            <div class="col-sm-9 shadow-l">
                <nav>
                    <ul class="nav nav-tabs h4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" style="color: blue;" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Orders</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" style="color: blue;" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact1" type="button" role="tab" aria-controls="contact1" aria-selected="false"><i class="fas fa-plus-square"></i>Add an Order</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-user-edit"></i>Update info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" style="color: red;" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Received</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" style="color: red;" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact2" type="button" role="tab" aria-controls="contact2" aria-selected="false"><i class="fas fa-plus-square"></i>Add a Receive</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact3" type="button" role="tab" aria-controls="contact3" aria-selected="false"><i class="fas fa-print "></i>Print</button>
                        </li>
                    </ul>
                </nav>
                <div class="tab-content" id="myTabContent" style=" height:20vmin;">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="table ">
                            <table class="table table-hover " style="border:black;">
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>cable name</th>
                                        <th>meter</th>
                                        <th>price per meter</th>
                                        <th>total</th>
                                        <th>data</th>
                                        <th>note</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered" style="border:black; " id="items">
                                    <tr>
                                        <?php
                                        $month = date('m');
                                        $sql = "SELECT * FROM `accountsell` WHERE customer_Id =" . $id;
                                        // $sql = "SELECT * FROM `accountsell` WHERE `date` BETWEEN '2021-" .$month. "-1' AND '2021-" . $month . "-30' and customer_Id=" . $id;

                                        $result = mysqli_query($connerct, $sql); // runing sql
                                        $i = 0;
                                        while ($row1 = mysqli_fetch_array($result)) {
                                            $i++;
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . $row1[2] . '</td>';
                                            echo '<td>' . number_format($row1[3], 2, '.', ',') . 'm</td>';
                                            echo '<td>' . number_format($row1[4], 2, '.', ',') . '$</td>';
                                            $total = $total + $row1[5];
                                            $date = explode(" ", $row1[6]);
                                            echo '<td>' . number_format($row1[5], 2, '.', ',') . '$</td>';
                                            echo '<td>' . $date[0] . '</td>';
                                            echo '<td>' . $row1[7] . '</td>';
                                        ?><div class="col-md-1">
                                                <td><a class="btn btn-primary bm-2" href="updateBerlin.php?case=1&edit_id=<?php echo $row1[0]; ?>&id=<?php echo $id; ?>"><i class="fas fa-pen"></i></a>
                                                    <a class="btn btn-danger bm-2" onclick="funcion1(<?php echo $row1[0]; ?>);"><i class="fas fa-trash-alt"></i></a>
                                                    <script>
                                                        function funcion1(id) {
                                                            var r = confirm("you sure you want to delete this row??");
                                                            if (r == true) {
                                                                window.location.href = "deleteBerlin.php?id=" + id + "&case=2&cId=<?php echo $id ?>";
                                                            }
                                                        }
                                                    </script>
                                                </td>
                                            </div>
                                    </tr>
                        </div>
                    <?php
                                        }
                    ?>
                    </tr>
                    </tbody>
                    </table>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 text-center">
                            <ul class="pagination" id="myPager"></ul>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="tab-pane" id="messages">
                        <div class="table">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>meter</th>
                                        <th>price per meter</th>
                                        <th>total</th>
                                        <th>data</th>
                                        <th>note</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="items">
                                    <tr>
                                        <?php
                                        $sql = "SELECT * FROM `accountsell1` WHERE customer_Id =" . $id;
                                        // $sql = "SELECT * FROM `accountsell1` WHERE `date` BETWEEN '2021-" .$month. "-1' AND '2021-" . $month . "-30' and customer_Id=" . $id;

                                        $result = mysqli_query($connerct, $sql); // runing sql
                                        $i = 0;
                                        while ($row1 = mysqli_fetch_array($result)) {
                                            $i++;
                                            echo '<td id="R">' . $i  . '</td>';
                                            echo '<td id="R">' . $row1[2] . '</td>';
                                            echo '<td id="R">' . number_format($row1[3], 2, '.', ',') . 'm</td>';
                                            echo '<td id="R">' . number_format($row1[4], 2, '.', ',') . '$</td>';
                                            $total1 = $total1 + $row1[5];
                                            $date = explode(" ", $row1[6]);
                                            echo '<td id="R">' . number_format($row1[5], 2, '.', ',') . '$</td>';
                                            echo '<td id="R">' . $date[0] . '</td>';
                                            echo '<td id="R">' . $row1[7] . '</td>';
                                        ?>
                                            <div class="col">
                                                <td id=""><a class="btn btn-primary bm-2" href="updateBerlin.php?case=2&edit_id=<?php echo $row1[0]; ?>&id=<?php echo $id; ?>"><i class="fas fa-pen"></i></a>
                                                    <a class="btn btn-danger bm-2" onclick="funcion(<?php echo $row1[0]; ?>);"><i class="fas fa-trash-alt"></i></a>
                                                    <script>
                                                        function funcion(id) {
                                                            var r = confirm("you sure you want to delete this row??");
                                                            if (r == true) {
                                                                window.location.href = "deleteBerlin.php?id=" +
                                                                    id + "&case=3&cId=<?php echo  $id; ?>";
                                                            }
                                                        }
                                                    </script>
                                                </td>
                                            </div>
                                    </tr>
                        </div>
                    <?php
                                        }
                    ?>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <!--            update form
tab              -->
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <hr>
                <form class="form" action="dbm.php" method="POST" id="updateform">
                    <div class="form-group ">
                        <div class="col-md-6">
                            <label for="first_name">
                                <h4>First name</h4>
                            </label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $row[1]; ?>" title="enter your first name if any." require>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name">
                                <h4>Last name</h4>
                            </label>
                            <input type="hidden" name="case" aria-label="Sell Price" value="7" require>
                            <input type="hidden" name="id1" aria-label="Sell Price" value="<?php echo $id; ?>" require>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $row[2]; ?>" title="enter your last name if any.">
                        </div>


                        <div class="col-md-6">
                            <label for="phone">
                                <h4>Phone number</h4>
                            </label>
                            <input type="text" maxlength="11" class="form-control" placeholder="0770-000-0000"  name="phone"  id="phone" value="<?php echo $row[4]; ?>" title="enter your phone number if any.">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-xs-12">
                            <br>
                            <button class="btn btn-lg btn-success" type="submit"><i class="fas fa-pen"></i> Update</button>

                        </div>
                    </div>
                </form>

            </div>

            <!-- 
month tab

 -->


            <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab">
                <a style="position: absolute; float : left;" onclick="full()"><i class="fas fa-expand-alt fa-3x"></i></a>
                <iframe src="accountMonthView.php?id=<?php echo $id; ?>" class="col-md-11" frameborder="0"></iframe>


                <script>
                    function full() {
                        document.getElementsByTagName("iframe")[0].className = "fullScreen";
                        document.getElementById("re").style.display = "inline";
                    }

                    function re() {
                        document.getElementsByTagName("iframe")[0].className = "";
                        document.getElementById("re").style.display = "none";

                    }
                </script>


            </div>
            <!-- 
form for inserting data to roishtu
tab
 -->

            <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
                <hr>
                <form class="form" action="dbm.php?cId=<?php echo  $id; ?>" method="POST" id="updateform">
                    <input type="hidden" name="id2" aria-label="Sell Price" value="<?php echo $id; ?>">

                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="first_name">
                                    <h4>Babat</h4>
                                </label>
                                <input type="text" class="form-control" name="name" id="myInput1" title="cable name" require>



                                <label for="last_name">
                                    <h4>Meter/dana</h4>
                                </label>

                                <input type="number" step=0.01 class="form-control" require onkeyup="arithmatic();" name="meter" id="meter" title="meters">




                                <label for="phone">
                                    <h4>Price of one meter</h4>
                                </label>
                                <input type="number" step=0.01 class="form-control" require name="price" onkeyup="arithmatic();" maxlength="11" id="price" title="price">



                                <label for="phone">
                                    <h4>Total</h4>
                                </label>
                                <input type="number" step=0.01 class="form-control" require name="total" maxlength="11" id="total" title="the total">


                                <label for="phone">
                                    <h4>Note</h4>
                                </label>
                                <input type="text" require step=0.01 class="form-control" name="note" id="total" title="the total">

                                <input type="hidden" name="case" aria-label="Sell Price" value="2">


                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-primary" type="submit"><i class="fas fa-check"></i> submit</button>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="myInput">
                                    <h4>Search of cable names</h4>
                                </label>

                                <input type="text" class="form-control"  aria-label="Cabel Name" onloadstart="clos()" type="text" id="myInput" onclick="showList();" onkeyup="search()" placeholder="Search for cable.." require>
                                <div id="my-scrollbar" class="dropdown-content main-content col-md-3">
                                    <ul id="myUL" class="">

                                        <?php
                                   
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
                        </div>
                    </div>
                </form>
            </div>
                <!-- 



                        form for inserting hatu 
                        like para 
                        qarz awa shtana

                     -->
                <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab">
                    <hr>
                    <form class="form" action="dbm.php?cId=<?php echo  $id; ?>" method="POST" id="updateform">
                        <input type="hidden" name="id3" aria-label="Sell Price" value="<?php echo $id; ?>">

                        <div class="form-group ">
                            <div class="col-md-6">
                                <label for="first_name">
                                    <h4>Babat</h4>
                                </label>
                                <input type="text" class="form-control" name="name" id="first_name" require title="cable name">
                            </div>
                            <div class="col-md-6">
                                <label for="last_name">
                                    <h4>Meter/Dana</h4>
                                </label>
                                <input type="number" step=0.01 class="form-control" name="meter" require onkeyup="arithmatic1();" id="meter1" title="meters">
                            </div>


                            <div class="col-md-6">
                                <label for="phone">
                                    <h4>Price of one meter</h4>
                                </label>
                                <input type="number" step=0.01 class="form-control" name="price" require maxlength="11" onkeyup="arithmatic1();" id="price1" title="price">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="phone">
                                <h4>Total</h4>
                            </label>
                            <input type="number" step=0.01 class="form-control" name="total" require maxlength="11" id="total1" title="the total">
                        </div>

                        <div class="col-md-6">
                            <label for="phone">
                                <h4>Note</h4>
                            </label>
                            <input type="text" step=0.01 class="form-control" name="note" require id="total" title="the total">
                        </div>

                        <input type="hidden" name="case" aria-label="Sell Price" value="12">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-primary" type="submit"><i class="fas fa-check"></i> submit</button>

                            </div>
                        </div>

                </div>
                </form>

            </div>
        </div>


    </div>
    </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 

    <input style="color: transparent;" id="hatuTotal" type="hidden" value="<?php echo $total; ?>">
    <input style="color: transparent;" id="roshtuTotal" type="hidden" value="<?php echo $total1; ?>">



    <script>
        var roshtu = document.getElementById("hatuTotal").value;
        var x = roshtu;
        roshtu = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD'
        }).format(roshtu);
        document.getElementById("tot").innerHTML = roshtu;
        hatu = document.getElementById("roshtuTotal").value;
        var y = hatu;

        hatu = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD'
        }).format(-1 * hatu);
        document.getElementById("tot1").innerHTML = hatu;
        var baqiat = Number(x) + Number(-1 * y);

        document.getElementById("tot2").innerHTML = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD'
        }).format(baqiat);
    </script>
    <table>
        <tr>

    </table>
 
</body>

</html>
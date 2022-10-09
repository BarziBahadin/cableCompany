<?php
include 'dbConnection.php';
if (isset($_GET['case'])) {
    $case = $_GET['case'];
} else {
    $case = 0;
}
switch ($case) {

    case 2:
        $sql = "DELETE FROM `accountsell` WHERE id =" . $_GET['id'];

        if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                // alert('delete done in roshtu');
                window.location.href = 'fullInfo.php?cId=<?php echo $_GET['cId'] ?>';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while inserting data');
            </script> <?php
                        echo mysqli_error($connerct);

                        echo $sql;
                    }
                    mysqli_close($connerct);
                    break;
                case 3:
                    $sql = "DELETE FROM `accountsell1` WHERE `accountsell1`.`id` =" . $_GET['id'];

                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                // alert('delete done in hatu');

                window.location.href = 'fullInfo.php?cId=<?php echo $_GET['cId'] ?>';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while inserting data');
            </script> <?php
                        echo mysqli_error($connerct);

                        echo $sql;
                    }
                    mysqli_close($connerct);
                    break;
                case 4:
                    $sql = "DELETE FROM `filename` WHERE `filename`.`id` =  " . $_POST['id2'];
                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                // alert('your file has been deleted ');
                window.location.href = 'fileViewBerlin.php?month=<?php echo $_GET['month']; ?>&year=<?php echo  $_GET["year"] ?>';
            </script><?php

                    } else {

                        ?>
            <script type="text/javascript">
                alert('error occurred while crating new file');
            </script> <?php
                        echo mysqli_error($connerct);
                        echo $sql;
                    }
                  
                    mysqli_close($connerct);

                   break;
                   case 5:
                    $sql="DELETE FROM `productfullinfo` WHERE `productfullinfo`.`id` =".$_GET["edit_id"];
                    if (mysqli_query($connerct, $sql)) { ?>
                        <script type="text/javascript">
                            alert('your row has been deleted ');
                            window.location.href = 'home.php';
                        </script><?php
            
                                } else {
            
                                    ?>
                        <script type="text/javascript">
                            alert('error occurred while crating new file');
                        </script> <?php
                                    echo mysqli_error($connerct);
                                    echo $sql;
                                }
                              
                                mysqli_close($connerct);
                    break;
                default:
                    $sql = "DELETE FROM `berlin` WHERE `berlin`.`id` =" . $_GET['id'];

                    if (mysqli_query($connerct, $sql)) { ?>
            <script type="text/javascript">
                window.location.href = 'berlin.php?id=<?php echo $_GET['idf'] ?>';
            </script><?php
                    } else {
                        ?>
            <script type="text/javascript">
                alert('error occurred while inserting data');
            </script> <?php
                        echo mysqli_error($connerct);

                        echo $sql;
                    }
                    mysqli_close($connerct);
                    break;
            }
                        ?>
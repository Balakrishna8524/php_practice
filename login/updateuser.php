<?php
include_once('function.php');


$uc=new DB_con();


if (isset($_POST['update'])) {


    $udata = [
        "name" => $_POST['name'],
        "uname" => $_POST['uname'],
        "email" => $_POST['email'],
        "uid" => $_POST['uid'],

    ];

    $res=$uc->updateUser($udata);

    if ($res == TRUE) {

        echo "Record updated successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 




$res=$uc->getUser($_GET['id']);

$row = mysqli_fetch_assoc($res);
//print_r($row['Username']);


?>


<form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            Name:<br>

            <input type="text" name="name" value="<?php echo $row['FullName']; ?>">

            <input type="hidden" name="uid" value="<?php echo $row['id']; ?>">

            <br>

           


            Username:<br>

            <input type="text" name="uname" value="<?php echo $row['Username']; ?>">

            <br>

            Email:<br>

            <input type="email" name="email" value="<?php echo $row['UserEmail']; ?>">

            <br>

            

            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<?php
session_start();
// include Function  file
include_once('function.php');


$uc=new DB_con();
$res=$uc->getAllUsers();


//$res=mysqli_fetch_assoc($ret);

//echo '<pre>';
//print_r($res);

echo '<div class="container">';
echo '<table class="table">';

echo '<tr>
<th>FullName</th>
<th>Username</th>
<th>UserEmail</th>
<th>Action</th>
</tr>';
//foreach ($res as $key => $value) {
while($row = mysqli_fetch_assoc($res)){
    
    echo '<tr>';
    echo '<td>'.$row['FullName'].'</td>';
    echo '<td>'.$row['Username'].'</td>';
    echo '<td>'.$row['UserEmail'].'</td>';
    echo '<td><a class="btn btn-sm btn-primary" href="updateuser.php?id='.$row['id'].'">Edit</a> &emsp;';
    echo '<a  class="btn btn-sm btn-danger" href="deluser.php?id='.$row['id'].'">Delete</a></td>';
    
    echo '<tr>';
}


echo '</table>';
echo '</div>';








?>
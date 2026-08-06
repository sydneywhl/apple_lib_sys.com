<?php
session_start();

include('connection.php');
include('sessionCheck.php');
include('header.php');


if (isset($_SESSION['librarian_id'])){
    $details = "select * from librarian
    where librarian_id = '".$_SESSION['librarian_id']."'";
    $id = $_SESSION['librarian_id'];
}
elseif (isset($_SESSION['member_id'])){
    $details = "select * from members
    where member_id = '".$_SESSION['member_id']."'";
    $id = $_SESSION['member_id'];
}

$execute_query = mysqli_query($condb, $details);

$userDetails = mysqli_fetch_assoc($execute_query);
?>

<h3>Account Details</h3>

<p>Library ID: <?= $userDetails['librarian_id'] ?? $userDetails['member_id']?><br>
Name: <?= $userDetails['librarian_name'] ?? $userDetails['member_name']?><br>
Phone Number: <?= $userDetails['librarian_phone_number'] ?? $userDetails['member_phone_number']?><br>
Password: <?= str_repeat('*', strlen($userDetails['password'])) ?><br>
<br>
<a href = 'editInfo.php'>Edit Info</a>
<?php 
if ($_SESSION['role']=='MEMBER'){
    echo"<a href = 'deleteMemberProcess.php?id=$id'
onClick=\"return confirm('Are you sure you want to delete your account?')\">
        Delete</a>
</p>";
}
if ($_SESSION['role']=='ADMIN' or $_SESSION['role']=='STAFF'){
    echo"<a href = 'deleteLibrarianProcess.php?id=$id'
onClick=\"return confirm('Are you sure you want to delete your account?')\">
        Delete</a>
</p>";
}
?>

<br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php');?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>
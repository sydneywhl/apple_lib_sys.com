<?php

session_start();

include('connection.php');
include('sessionCheck.php');
include('header.php');

if (isset($_SESSION['librarian_id'])){
    $details = "select * from librarian
    where librarian_id = '".$_SESSION['librarian_id']."'";
}
elseif (isset($_SESSION['member_id'])){
    $details = "select * from members
    where member_id = '".$_SESSION['member_id']."'";
}

$execute_query = mysqli_query($condb, $details);

$userDetails = mysqli_fetch_assoc($execute_query);
?>

<h3>Account Details</h3>
<form action="editInfoProcess.php" method="POST">
<label class="highlight">Library ID: <?= $userDetails['librarian_id'] ?? $userDetails['member_id']?><br></label>
<br>
<label class="highlight">Name:</label> <input type="text" name = 'name' value="<?= $userDetails['librarian_name'] ?? $userDetails['member_name']?>" required>
<br>
<label class="highlight">Phone Number:</label> <input type="text" name = 'phone_number' value="<?= $userDetails['librarian_phone_number'] ?? $userDetails['member_phone_number']?>" required>
<br>
<label class="highlight">Password:</label> <input type="text" name = 'password' value = "<?= $userDetails['password'] ?>"><br>
<br>
<input type="submit" value="Save Changes">
</form>

<br>
<center> <a href = 'accountDetails.php'>Cancel</a> </center>

<br><br>
<?php include('footer.php');?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>
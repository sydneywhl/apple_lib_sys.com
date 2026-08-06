<?php
session_start();

include ('sessionCheck.php');
include('header.php');

if (empty($_GET)){
    die("<script>window.location.href='memberList.php';</script>");
}

$id = $_GET['member_id'];
?>

<h3>Edit Member Information</h3>
<form action = 'editMemberProcess.php?old_id=<?=$_GET['member_id']?>' method = 'POST'>

<label class="highlight">Member Name</label> <input type = 'text' name = 'member_name' value = '<?=$_GET['member_name']?>' required><br>
<label class="highlight">Phone Number</label> <input type='text' name='member_phone_number' value='<?=$_GET['member_phone_number']?>' required><br>
<label class="highlight">Password</label> <input type='text' name='password' value='<?=$_GET['password']?>' required><br>
<input type='submit' value='Update'>
</form>
<br><br><br><br><br>
<?php include ('footer.php');?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>
<?php
session_start();

include('header.php');
?>

<h3>Register as a Library Member Today!</h3>
<form action ='registerMemberProcess.php' method = 'POST'>
    <label class="highlight">Member Name</label>  <input type="text" name = 'member_name' required><br>
    <label class="highlight">Phone Number (01XXXXXXXX)</label> <input type="text" name="member_phone_number"required><br>
    <label class="highlight">Password</label> <input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>

<?php
if (empty($_SESSION['role'])){
    echo "<br> <center><a href = 'logIn.php'>Have an account?</a></center>
";
} ?>

<br><br><br><br><br>
<?php include('footer.php'); ?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>

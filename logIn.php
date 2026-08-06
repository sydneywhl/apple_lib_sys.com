<?php 

session_start();
include('header.php');
/*if the user had just registered, the system will
auto fill in the assigned id from the registerMemberProcess*/
$prefilledId = $_SESSION['newId'] ?? '';
$isReadonly = isset($_SESSION['newId']);
unset($_SESSION['newId']);
?>

<h3>Log In</h3>

<!-- the form to receive input of credentials
if the user has just registered, the id will be 
read only, and if the user is just logging like an 
existing user, then the id field will be empty and required
to fill in 

-->

<form action = 'logInProcess.php' method ='POST'>
    <?php 
    if ($prefilledId){
        echo "Your Member ID has been auto-filled, enter your password to log in.<br><br>";
    }
    
    ?>
    <label class="highlight">Library ID</label> <input type = 'text' name = 'ID' 
    value = "<?php echo $prefilledId; ?>"
    <?php echo $isReadonly ? 'readonly': 'required';?>><br>
    <label class="highlight">Password</label> <input type = 'password' name = 'password' required><br>
    <input type = 'submit' name = 'Log In'>
</form>
<br>
<center><a href = 'registerMember.php'>Register as Member</a></center>

<br><br><br><br><br><br><br><br><br>
<?php include ('footer.php');?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>
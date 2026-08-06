<?php
session_start();

include('header.php');
include('sessionCheck.php');
?>


<h3>Register New Author</h3>
<form action = 'registerAuthorProcess.php' method='POST'>
    <label class="highlight">Author Name</label><input type ='text' name='author_name'required><br>
    <input type = 'submit' value='Register'>
</form>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include('footer.php')?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>

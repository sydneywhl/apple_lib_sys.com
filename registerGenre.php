<?php
session_start();

include('header.php');
include('sessionCheck.php');
?>


<h3>Register New Genre</h3>
<form action = 'registerGenreProcess.php' method='POST'>
    <label class="highlight">Genre Name</label><input type ='text' name='genre_name'required><br>
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

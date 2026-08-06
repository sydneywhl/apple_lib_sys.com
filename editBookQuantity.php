<?php
session_start();

include('sessionCheck.php');
include('header.php');

if (empty($_GET)){
    die("<script>window.history.back()';</script>");
}

$id = $_GET['isbn'];
?>

<h3>Edit Book Information</h3>
<form action = 'editBookQuantityProcess.php?old_id=<?=$_GET['isbn']?>' method = 'POST'>
<img src = 'images/<?=$_GET['images']?>' width = '20%'><br>

<br>
<label class="highlight">ISBN:</label> <?= $_GET['isbn']?><br>
<label class="highlight">Book Title:</label> <?= $_GET['book_title']?>'<br>
<label class="highlight">Author Name:</label> <?= $_GET['author_name']?><br>
<label class="highlight">Genre:</label> <?= $_GET['genre_name']?><br>
<br>
<label class="highlight">Available Copies</label> <input type = 'text' name='available_copies' value='<?= $_GET['available_copies']?>' required> <br>

<input type='submit' value = 'Update'>

</form>
<?php include ('footer.php');?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>
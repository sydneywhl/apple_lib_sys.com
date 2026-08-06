<?php
session_start();

include('header.php');
include('sessionCheck.php');
?>


<h3>Borrow Book</h3>
<form action = 'bookBorrowProcess.php' method='POST'>
    <label class="highlight">ISBN</label><input type = text name = 'isbn' value = '<?= $_GET['isbn']?>' readonly><br><br>
    <label class="highlight">Member ID</label><input type ='text' name='member_id'required><br>
    <input type = 'submit' value='Borrow for 7 days'>
</form>
<br><br><br><br><br><br>
<?php include('footer.php')?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>

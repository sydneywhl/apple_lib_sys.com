<?php
session_start();

include ('sessionCheck.php');
include('header.php');

if (empty($_GET)){
    die("<script>window.location.href='librarianList.php';</script>");
}

$id = $_GET['librarian_id'];
?>

<h3>Edit Librarian Information</h3>
<form action = 'editLibrarianProcess.php?old_id=<?=$_GET['librarian_id']?>' method = 'POST'>

<label class="highlight">Librarian Name</label> <input type = 'text' name = 'librarian_name' value = '<?=$_GET['librarian_name']?>' required><br>
<label class="highlight">Librarian Type</label> <select name = 'librarian_type' required>
        <label for = 'librarian_type'>Choose a librarian type:</label>
        <option value="STAFF">Staff</option>
        <option value="ADMIN">Admin</option>
    </select><br>
<label class="highlight">Phone Number</label> <input type='text' name='librarian_phone_number' value='<?=$_GET['librarian_phone_number']?>' required><br>
<label class="highlight">Password</label> <input type='text' name='password' value='<?=$_GET['password']?>' required><br>
<input type='submit' value='Update'>
</form>
<br>
<?php include ('footer.php');?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>
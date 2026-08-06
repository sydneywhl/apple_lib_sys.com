<?php
session_start();

include('header.php');
?>

<h3>Register a Librarian</h3>
<form action ='registerLibrarianProcess.php' method = 'POST'>
    <label class="highlight">Librarian Name</label>  <input type="text" name = 'librarian_name' required><br>
    <label class="highlight">Librarian Type</label> <select name = 'librarian_type' required>
        <label for = 'librarian_type'>Choose a librarian type:</label>
        <option value="STAFF">Staff</option>
        <option value="ADMIN">Admin</option>
    </select><br>
    <label class="highlight">Phone Number (01XXXXXXXX)</label> <input type="text" name="librarian_phone_number"required><br>
    <label class="highlight">Password</label> <input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>

<br>
<?php include('footer.php');?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>
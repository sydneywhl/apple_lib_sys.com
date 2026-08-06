<?php
session_start();

include ('connection.php');
include('sessionCheck.php');
include('header.php');

if ($_SESSION['role'] != 'ADMIN' and $_SESSION['role'] != 'STAFF'){
    die ("<script>alert('Please log in again');
    window.location.href = 'logIn.php'</script>;");
}
?>

<h3>Register a New Book</h3>
<form action = 'registerBookProcess.php' method = 'POST'
enctype='multipart/form-data'>

<label class="highlight">ISBN:</label> <input type="text" name='isbn' required><br>
<label class="highlight">Book Title:</label> <input type="text" name='book_title' required><br>

<!--list of searchable authors-->
<label class="highlight">Author Name:</label> <select name='author_id'required>
        <option selected disabled>Please choose author</option>
        
<?php   
    
$listauthor= "select * from author order by author_name";
$executeauthor = mysqli_query($condb, $listauthor);
while($m=mysqli_fetch_array($executeauthor))
{
     echo "<option value='".$m['author_id']."'>".$m['author_name']."</option>";
}
?>
</select><br>   

<!--Button to register new authors-->    
<a href='registerAuthor.php'>Register New Author</a><br>
<br>

<!--list of genres-->
<label class="highlight">Genre:</label> <select name='genre_id'required>
        <option selected disabled>Please choose genre</option>

<?php
    
$listgenre= "select * from genre order by genre_name";
$executegenre = mysqli_query($condb, $listgenre);
while($m=mysqli_fetch_array($executegenre))
{
    echo "<option value='".$m['genre_id']."'>".$m['genre_name']."</option>";
}
?>
</select><br>

<!--Button to register new genres-->    
<a href='registerGenre.php'>Register New Genre</a><br>
<br>

<label class="highlight">Available Copies:</label> <input type = 'text' name='available_copies' required> <br>

<label class="highlight">Cover Image:</label> <br><br> <input type ='file' name = 'images' required><br>
<br>

<input type='submit' value = 'Register'>

</form>
<?php include ('footer.php');?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>
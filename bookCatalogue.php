<?php
session_start();
 
include('header.php');
include('connection.php');
include('sessionCheck.php');
 
?>
 
<h3>Book Catalogue</h3>
<form action="" method="POST">
<label class="highlight">Title</label> <input type='text' name='book_title'>
<input type='submit' value = 'Search'> <br><br>
<label class="highlight">Author Name</label> <input type='text' name='author_name'>
<input type='submit' value = 'Search'> 
</form>

<?php
if ($_SESSION['role']== 'ADMIN' or $_SESSION['role'] == 'STAFF'){
    echo " <br><br> <center> <a href='registerBook.php'>Register New Book</a> </center>";
}
?>

 
<table border="1" id='size'>
<?php
 
$searchbook = " "; 
$findbook = " ";
 
#search for books
if (!empty($_POST['book_title']))
{
    #if searching by title
    if (!empty($_POST['book_title']))
    {
        $searchbook = $searchbook." "." AND books.book_title like '%".$_POST['book_title']."%'";
        $findbook = $findbook. "".$_POST['book_title']."<br>";
        echo "<center><br><br><br>Searching book title with the keyword:".$findbook;
        echo "</center>";
    }    
 
    #selecting books to be displayed based on search
    $selectbooks= "select books.isbn, books.book_title, author.author_name, genre.genre_name, books.available_copies, librarian.librarian_name,images
    from books, author, librarian, genre
    where books.author_ID = author.author_ID 
    and books.librarian_id = librarian.librarian_id
    and genre.genre_ID = books.genre_ID
    $searchbook
    order by books.isbn;";
 
    $execute = mysqli_query($condb, $selectbooks);
 
    #if ther e is no matching records
    if(mysqli_num_rows($execute)==0)
    {
        echo "<br><center>No books available";
    }
    #displaying the books from the title search
    while ($n=mysqli_fetch_array($execute))
    {
        $data_get=array(
            'isbn' => $n['isbn'],
            'book_title' => $n['book_title'],
            'author_name' => $n['author_name'],
            'genre_name' => $n['genre_name'],
            'available_copies' => $n['available_copies'],
            'librarian_name' => $n['librarian_name'],
            'images' => $n['images']
        );

        echo"<tr>
<td><img width height = 300px src='images/".$n['images']."'></td>
<td width = 300px>
<b>".$n['book_title']."</b><br> 
        ".$n['isbn']."<br>
        ".$n['author_name']."<br>
        Genre: ".$n['genre_name']."<br>
        Available copies: ".$n['available_copies']."<br>";
        # Only show for admin or staff
        if ($_SESSION['role'] == 'ADMIN' or $_SESSION['role'] == 'STAFF') {
            echo "Last edited by: ".$n['librarian_name']."<br><br><hr>";
            echo "<br>
            <a href = 'bookBorrow.php?".http_build_query($data_get)."'>Member Borrow</a><br><br>
            <a href='editBookQuantity.php?".http_build_query($data_get)."'>Update Available Copies</a>
            <br><br><a href='deleteBookProcess.php?id=".$n['isbn']."'
            onClick=\"return confirm('Are sure you want to delete this data?')\">Delete</a>";
        }
        
    echo"</td>
</tr>";    
        }    
    echo"</table>";
}
 
#if searching by author name
else if(!empty($_POST['author_name']))
{
    if (!empty($_POST['author_name']))
    {
        #searching for related titles
        $searchbook = $searchbook." "." AND author.author_name like '%".$_POST['author_name']."%'";
        $findbook = $findbook. "".$_POST['author_name']."<br>";
        echo "<center><br><br><br>Searching author with the keyword: ".$findbook;
        echo "</center>";       
    }
    #query for the requested book
    $selectbooks= "select books.isbn, books.book_title, author.author_name, genre.genre_name, books.available_copies, librarian.librarian_name,images
    from books, author, librarian, genre
    where books.author_ID = author.author_ID 
    and books.librarian_ID = librarian.librarian_ID
    and genre.genre_ID = books.genre_ID
    $searchbook
    order by books.isbn;";
 
    $execute = mysqli_query($condb, $selectbooks);
 
    #if there is no match
    if(mysqli_num_rows($execute)==0)
    {
        echo "<br><center>No books available.</center>";
    }
    else
    {
        #displaying the books from author search
        while ($n=mysqli_fetch_array($execute))
        {
            $data_get=array(
            'isbn' => $n['isbn'],
            'book_title' => $n['book_title'],
            'author_name' => $n['author_name'],
            'genre_name' => $n['genre_name'],
            'available_copies' => $n['available_copies'],
            'librarian_name' => $n['librarian_name'],
            'images' => $n['images']
            );

        echo"<tr>
<td><img height =300px src='images/".$n['images']."'></td>
<td width = 300px>
<b>".$n['book_title']."</b><br> 
        ".$n['isbn']."<br>
        ".$n['author_name']."<br>
        Genre: ".$n['genre_name']."<br>
        Available copies: ".$n['available_copies']."<br>";
        # Only show for admin or staff
        if ($_SESSION['role'] == 'ADMIN' or $_SESSION['role'] == 'STAFF') {
            echo "Last edited by: ".$n['librarian_name']."<br>";
            echo "<br><br>
            <a href='editBookQuantity.php?".http_build_query($data_get)."'>Update Available Copies</a>       
            <br><br><a href='deleteBooksProcess.php?id=".$n['isbn']."'
            onClick=\"return confirm('Are sure you want to delete this data?')\">Delete</a>";
        }
    echo "</td>
</tr>";
        }
        echo"</table>";
    }
}
else
{
    echo "<center> <br>Please enter search details<br> </center><br><br>";
}

 
include('footer.php');?>
<head>
<link rel="stylesheet"
href="astyle.css"> 
</head>
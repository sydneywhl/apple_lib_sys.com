<?php

session_start();

include ('connection.php');
include ('sessionCheck.php');
include ('header.php');

?>

<h3>Borrowed Books</h3>

<?php

$current_date = date("Y-m-d");

if(isset($_SESSION['member_id'])){
    $borrowedbooks = "select books.book_title, books.isbn, author.author_name, genre.genre_name, borrowed_by.borrow_date, borrowed_by.return_date, images, borrowed_by.member_id, members.member_name
    from books, author, borrowed_by, genre, members
    where books.author_id = author.author_id
    and books.isbn = borrowed_by.isbn
    and genre.genre_id = books.genre_id
    and borrowed_by.member_id = members.member_id
    and borrowed_by.member_id = '".$_SESSION['member_id']."'";
}
elseif(isset($_SESSION['librarian_id'])){
    $borrowedbooks = "select books.book_title, books.isbn, author.author_name, genre.genre_name, borrowed_by.borrow_date, borrowed_by.return_date, images, borrowed_by.member_id, members.member_name
    from books, author, borrowed_by, genre, members
    where books.author_id = author.author_id
    and books.isbn = borrowed_by.isbn
    and genre.genre_id = books.genre_id
    and members.member_id = borrowed_by.member_id
    order by borrowed_by.member_id";
}

$execute = mysqli_query($condb, $borrowedbooks);

if(mysqli_num_rows($execute)==0)
{
    echo "<center>No books borrowed. Start borrowing books now!";
    echo "<br><p><a href = 'bookCatalogue.php'>Book Catalogue</a></p></center>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}

while($m=mysqli_fetch_array($execute))
{
    #accumulate data to an array for the purpose of updating items
    $data_get=array(
    'isbn' => $m['isbn'],
    'book_title' => $m['book_title'],
    'author_name' => $m['author_name'],
    'genre_name' => $m['genre_name'],
    'images' => $m['images'],
    'borrow_date' => $m['borrow_date'],
    'return_date' => $m['return_date'],
    'member_id' => $m['member_id'],
    'member_name' => $m['member_name']
    );
    


    echo "<table border='1' id='size'>";
            echo "<tr>
            <td width=30%><img width='75%' src='images/".$m['images']."'></td>
            <td>
            <b>".$m['book_title']."</b><br>
            ".$m['isbn']."<br>
            ".$m['author_name']."<br>
            Genre: ".$m['genre_name']."<br><hr>";
            if ($_SESSION['role'] == 'ADMIN' or $_SESSION['role'] == 'STAFF'){
            echo "
            Borrowed by:
            <b>".$m['member_id']."</b><br>
            ".$m['member_name']."<br>";
            }

            echo "<br>Borrowed on: ".$m['borrow_date']."<br>
            Return on: ".$m['return_date']."<br>";

    if ($_SESSION['role'] == 'ADMIN' or $_SESSION['role'] == 'STAFF') {
        echo"<br><a href='bookReturnProcess.php?isbn=".$m['isbn']."&member_id=".$m['member_id']."'onClick=\"return confirm('Are you sure you want to return this book?')\">Return Book</a>
            </td>
            </tr>";
    }
    
    
echo"</table>";    
}
        
include('footer.php')?>
    
<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>
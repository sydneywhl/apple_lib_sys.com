<?php

session_start();

#calling header and connection file
include("connection.php");
include ("sessionCheck.php");
include("header.php");


if (empty($_SESSION['role']))
{
    die ("<script>window.location.href='logIn.php';</script>");
}
?>

<h3>A Random Book a Day, Keeps the Doctor Away</h3>

<?php

#selecting a random book for user
$sql_select = "
SELECT * FROM books
JOIN author ON books.author_id = author.author_id
JOIN genre ON books.genre_id = genre.genre_id
ORDER BY RAND() LIMIT 1";

#executing the selection of the popular books
$execute_select = mysqli_query(mysql: $condb, query: $sql_select);



#if no data is found/if there is an error
if (mysqli_num_rows(result: $execute_select)==0)
{
    echo "No books available. Sorry!";
}

#if data is found it will be displayed in a table format
else
{
    echo "<hr>
    <table border = '0'>";


    #the $n is taking the data from the db and putting it in the table
    while ($n = mysqli_fetch_array(result:$execute_select))
    {
        echo"<tr>
        <td><img height = 300px src = 'images/".$n['images']."'></td>
        <td width = 300px>
        <b>".$n['book_title']."</b><br>
        ISBN: ".$n['isbn']."</br>
        Author: ".$n['author_name']."</br>
        Genre: ".$n['genre_name']."</br>
        Available Copies: ".$n['available_copies']."
        </td>
        </tr>
        ";
    }
    echo "</table>";
}
?>

<br><br>
<?php include ('footer.php'); ?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>
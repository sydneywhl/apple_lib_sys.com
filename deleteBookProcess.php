<?php
session_start();

/*from the bookCatalogue, at the delete button, 
the program is getting (GET) the isbn information 
where the button is pressed, hence deleting that record 
where the ID matches */
if(!empty($_GET))
{
    include('connection.php');

    #delete book data based on the ID that was sent (GET)
    $delete_book="delete from books where isbn='".$_GET['id']."'";
    
    if(mysqli_query($condb,$delete_book))
    {
        #display message that the data is successfully deleted
        echo "<script>alert('Book is deleted successfully.');
        window.location.href='bookCatalogue.php';</script>";
    }
    else
    {
        #failed to delete
        echo "<script>alert('Failed to delete record. Please try again.');
        window.history.back();</script>";
    }
}
else
{
    #if there was no data sent to GET, you'll have to delete it manually from the database 
    die("<script>alert('Error, please access the database directly.');
    window.location.href='bookCatalogue.php';</script>");
}
?>


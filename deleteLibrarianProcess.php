<?php
session_start();

/*from the librarianList, at the delete button, 
the program is getting (GET) the librarian_ID information 
where the button is pressed, hence deleting that record 
where the ID matches */
if(!empty($_GET))
{
    include('connection.php');

    #delete librarian data based on the ID that was sent (GET)
    $delete_librarian="delete from librarian where librarian_id='".$_GET['id']."'";
    
    if(mysqli_query($condb,$delete_librarian))
    {
        #display message that the data is successfully deleted
        echo "<script>alert('Librarian is removed successfully.');
        window.location.href='librarianList.php';</script>";
    }
    else
    {
        #failed to delete
        echo "<script>alert('Failed to delete record. Please try again.');
        window.location.href='librarianList.php';</script>";
    }
}
else
{
    #if there was no data sent to GET, you'll have to delete it manually from the database 
    die("<script>alert('Error, please access the database directly.');
    window.location.href='librarianList.php';</script>");
}
?>


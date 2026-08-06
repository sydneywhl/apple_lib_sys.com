<?php
session_start();
include ('connection.php');
include ('sessionCheck.php');


#checks if post is empty
if(!empty($_POST))
{
    #copies cannot be less than 0
    if($_POST['available_copies']<0)
    {
        die("<script>alert('Number of available copies cannot be less than 0.');
        window.history.back();</script>");
    }
    #command to update details of books
    $updatebooks = "update books set
    available_copies = '".$_POST['available_copies']."',
    librarian_id = '".$_SESSION['librarian_id']."'
    where isbn = '".$_GET['old_id']."'";

    #execute the update
    if(mysqli_query($condb, $updatebooks))
    {
        echo "<script>alert('Updated successfully.');
        window.location.href='bookCatalogue.php';</script>";
    }
    else
    {
        echo "<script>alert('Update failed.');
        window.history.back();</script>";
    }
}
else
{
    #if POST is empty
    die("<script>alert('Please fill in all text fields.');
    window.history.back();</script>");
}
?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>